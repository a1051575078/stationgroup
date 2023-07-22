<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Sogousame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sogousame';

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
        $ip=file_get_contents(public_path('ip.txt'));
        $ip=explode("\r\n",$ip);
        $str='';
        $header=[
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
        $ci=file_get_contents(public_path('ciyu.txt'));
        $ci=explode(PHP_EOL,str_replace("\r",'',$ci));
        foreach ($ci as $j){
            if($ip[0]==='IP用完'){
                return $ip[0];
            }
            $date=time();
            $ciyu=urlencode($j);
            $link='https://wap.sogou.com/web/searchList.jsp?v=5&from=index&pid=sogou-waps-7880d7226e872b77&w=1274&t='.($date-5*60).mt_rand(100,999).'&s_t='.$date.mt_rand(100,999).'&s_from=index&pg=webSearchList&inter_index=&keyword='.$ciyu.'&suguuid=bd5e895f-4148-457a-b162-4a8cb2d5440b&sugsuv=AAEYLNY0NgAAAAqgMiE4BAEAkwA&sugtime='.$date.mt_rand(100,999);
            $source=$this->simulation($link,$header,$ip);
            /*preg_match_all('/data-item="[\s\S]*?>(.*?)<\/a>?/i',$source,$matches);*/
            preg_match_all('/data-item="{&quot;o&quot;:{&quot;linkid&quot;:\d+},&quot;i&quot;:{&quot;htpos&quot;:0,&quot;htindex&quot;:\d+}}">(.*?)<\/a>?/i',$source,$matches);
            if(!empty($matches[1])){
                echo $j."\n";
                $str=$str.$j."\n";
                foreach($matches[1] as $v){
                    echo $v."\n";
                    $str=$str.$v."\n";
                }
            }
        }
        $handle=fopen(public_path('/ciyu.txt'),"w+");
        fwrite($handle,$str);
        fclose($handle);
    }
    protected function simulation($link,$header,$ip){
        $ch=curl_init();//初始化1s1
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
}
