<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Black extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:black';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $ip=file_get_contents(public_path('ip.txt'));  //TXT文本  例如站群IP， 比如  127.0.0.1  换行 127.0.0.2  换行  ……
        $ip=explode("\r\n",$ip);
        $str='';
        $header=[ //请求的头部信息
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "Accept-Encoding: gzip, deflate, br",
            "Accept-Language: zh-CN,zh;q=0.9",
            "Cache-Control: max-age=0",
            "Connection: keep-alive",
            "Host: wap.sogou.com",
            "Referer: https://wap.sogou.com/",
            "sec-ch-ua-mobile: ?0",
            "Sec-Fetch-Dest: document",
            "Sec-Fetch-Mode: navigate",
            "Sec-Fetch-Site: same-origin",
            "Sec-Fetch-User: ?1",
            "Upgrade-Insecure-Requests: 1",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36"];
        $jc=file_get_contents(public_path('jc.txt')); //你的禁词
        $jc=explode(PHP_EOL,str_replace("\r",'',$jc));
        foreach ($jc as $j){
            if($ip[0]==='IP用完'){
                return $ip[0];
            }
            $date=time();
            $ciyu=urlencode($j);
            $link='https://wap.sogou.com/web/searchList.jsp?v=5&from=index&pid=sogou-waps-7880d7226e872b77&w=1274&t='.($date-5*60).mt_rand(100,999).'&s_t='.$date.mt_rand(100,999).'&s_from=index&pg=webSearchList&inter_index=&keyword='.$ciyu.'&suguuid=bd5e895f-4148-457a-b162-4a8cb2d5440b&sugsuv=AAEYLNY0NgAAAAqgMiE4BAEAkwA&sugtime='.$date.mt_rand(100,999);
            $source=$this->simulation($link,$header,$ip);
            //如果首页爬下来没有下一页,属于违禁词
            preg_match('/下一页/',$source,$match);
            if(empty($match[0])){
                continue;
            }
            preg_match_all('/<div[\s\S]*?citeurl[\s\S]*?<span[\s\S]*?>([\s\S]*?)<\/span>/i',$source,$matches);
            /*<div class="citeurl "  vrcid="citeurl.e84ce73">
      <span class="img-wrap">
          <img src="https://img03.sogoucdn.com/app/a/200913/30b30b6c3013fff8a43e58a2bccf2ae4.png" onerror="this.parentNode.style.display='none'">
        </span><span class="">搜狐</span><span class="cite-date ">2016-08-09</span></div>*/
            /*preg_match_all('/<h3[\s\S]*?<\/h3>/i',$source,$matches);
            $array=array_map(function($item){
                return str_replace('https','http',$item);
            },$matches[0]);

            if(count(array_unique($array))<6){
                continue;
            }*/
            $num=0;
            foreach($matches[1] as $v){
                if(preg_match('/<img/i',$v)){
                    continue;
                }
                /*preg_match_all('/href="\.\/id[\s\S]*?url=http%3A%2F%2F([\s\S]*?)%/i',$v,$matches);
                if(empty($matches[1][0])){
                    continue;
                }*/
                $tmpArr=explode('.',$v);
                if(count($tmpArr)<=1){
                    continue;
                }
                $firstDomain=$this->getDomain($v);
                //判断是不是IP
                if(!preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/',$firstDomain)){
                    if(in_array($firstDomain,config('app.diy.black'))){
                        continue;
                    }elseif(preg_match('/javascript:void\(0\)/',$v)){
                        continue;
                    }
                }
                $num++;
                //如果违禁词得数量超过5个则跳出循环
                if($num>4){
                    echo $j."\n";
                    $str=$str.$j."\n";
                    break;
                }
            }
        }
        $handle=fopen(public_path('/ciyu.txt'),"a+");
        fwrite($handle,$str);
        fclose($handle);
    }
    //如果IP被封了，这样则可以循环至下一个IP
    protected function simulation($link,$header,$ip){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',$link));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_INTERFACE,$ip[0]);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3);
        curl_setopt($ch,CURLOPT_TIMEOUT,6);
        $source=curl_exec($ch);
        curl_close($ch);
        if($source==='Found'){
            array_push($ip, array_shift($ip));
            $handle=fopen(public_path('/ip.txt'),"w");
            fwrite($handle,implode("\r\n",$ip));
            fclose($handle);
            return $this->simulation($link,$header,$ip);
        }
        return $source;
    }
    protected function getDomain($host){
        if(filter_var($host,FILTER_VALIDATE_IP)){//如果是ip地址
            return $host;
        }
        //获取访问的url
        $domain=explode('.',strtolower($host));
        $count=count($domain);
        //如果域名分解出来少于3 有可能是 xxx.com 默认首位是www
        if($count<3){
            return $domain[0].'.'.$domain[1];
        }else{
            //就是www.xxx.com 或者 xxx.xxx.com 也有可能是 xxx.com.cn，前面省略了www
            if(in_array($domain[$count-2].'.'.$domain[$count-1],config('app.diy.domain'))){
                //说明这是.com.cn org.cn 这种连续域名
                if($count===3){
                    return $domain[0].'.'.$domain[1].'.'.$domain[2];
                }else{
                    $temporary='';
                    //有可能是a.b.c.com.cn
                    for($i=0;$i<$count-3;$i++){
                        $temporary=$temporary.$domain[$i].'.';
                    }
                    return $domain[$count-3].'.'.$domain[$count-2].'.'.$domain[$count-1];
                }
            }else{
                //说明这肯定是a.d.com
                $temporary='';
                for($i=0;$i<$count-2;$i++){
                    $temporary=$temporary.$domain[$i].'.';
                }
                return $domain[$count-2].'.'.$domain[$count-1];
            }
        }
    }
}
