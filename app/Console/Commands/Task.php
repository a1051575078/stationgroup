<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Task extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '执行任务';

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
        //删除缓存
        $fp=@file(Storage_path('app/public/txtinfo/links.txt'));
        $fp=str_replace("\n",'',$fp);
        $fp=str_replace("\r",'',$fp);
        $cache=$this->curl(config('app.diy.delcache'));
        if($cache){
            $cache=explode(PHP_EOL,$cache);
            $cache=str_replace("\r",'',$cache);
            for($i=0;$i<count($cache);$i++){
                if($cache[$i]){
                    if(in_array($cache[$i],$fp)){
                        $fp=array_diff($fp,[$cache[$i]]);
                    }
                    Storage::disk('local')->deleteDirectory('cache/'.$cache[$i]);
                }
            }
            $array=array_map(function($item){
                return $item."\r\n";
            },$fp);
            if($array){
                $array=array_splice($array,0,count($array));
                $array[count($array)-1]=str_replace("\r\n",'',$array[count($array)-1]);
            }
            Storage::disk('local')->put('txtinfo/links.txt',$array);
        }
        //爬取最新新闻热点标题和句子等
        if(config('app.diy.automatic')){
            $title=[];
            $temporary=[];
            foreach(config('app.diy.news') as $new){
                $source=$this->changeCoding($this->curl($new));
                preg_match_all('/<a[\s\S]*?>([\s\S]*?)<\/a>/',$source,$matches);
                if(!empty($matches[1])){
                    foreach($matches[1] as $k=>$match){
                        //字符串不包含这些，字符串汉字必须大于5个字，字符串不能没有1个汉字
                        if(!preg_match('/<|\[|qq|&/i',$match)&&strlen($match)>28&&preg_match("/([\x81-\xfe][\x40-\xfe])/",$match)){
                            $match=str_replace("\r",'',$match);
                            $match=str_replace("\n",'',$match);
                            array_push($title,$match);
                            if(preg_match('/href=[\'\"]([\s\S]*?html)[\'\"]/',$matches[0][$k],$match)){
                                array_push($temporary,$match[1]);
                            }
                        }
                    }
                }
            }
            $articles=[];
            foreach($temporary as $p){
                $content=$this->changeCoding($this->curl($p));
                preg_match_all('/<p[\s\S]*?<\/p>/',$content,$matches);
                foreach($matches[0] as $match){
                    preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$match,$content);
                    $str=implode('',$content[0]);
                    if(!preg_match('/&|网上商城|服务热线|短信的形式|找回密码|意见反馈|瞬息万变|二维码|新浪游戏|版权声明|关于我们|公众号|导航|简介/i',$str)&&strlen($str)>80){
                        array_push($articles,$str);
                    }
                }
            }
            $fileTitle=Storage::allFiles('txtinfo/title');
            $fileArticles=Storage::allFiles('txtinfo/articles');
            $name=mt_rand(1,999999);
            Storage::disk('local')->put('txtinfo/title/'.$name.'.txt',implode("\r\n",array_unique($title)));
            Storage::disk('local')->put('txtinfo/articles/'.$name.'.txt',implode("\r\n",array_unique($articles)));
            $isTitle=Storage::disk('local')->exists('txtinfo/title/'.$name.'.txt');//判断是否已经有这个缓存了
            $isArticles=Storage::disk('local')->exists('txtinfo/articles/'.$name.'.txt');//判断是否已经有这个缓存了
            if($isTitle&&$isArticles){
                Storage::delete($fileTitle);
                Storage::delete($fileArticles);
            }
        }
        //百度推送
        if(config('app.diy.baidutoken')){
            $domain=Storage::directories('cache');
            $ip=file_get_contents(public_path('ip.txt'));
            $ip=explode("\r\n",$ip);
            $ip=array_values(array_diff($ip,['IP用完']));
            foreach($domain as $v){
                while(true){
                    $addr=array_shift($ip);
                    $source=$this->baiduApi(str_replace('cache/','',$v),$addr);
                    array_push($ip,$addr);
                    if(preg_match('/error/i',$source)){
                        break;
                    }
                }
            }
        }
    }
    //百度api推送
    protected function baiduApi($domain,$ip){
        $urls=[];
        $time=date('Ymd',time());
        for($i=0;$i<100;$i++){
            array_push($urls,'http://www.'.$domain.'/'.$time.'/'.$this->randStr(mt_rand(4,8)).'.html');
        }
        $api='http://data.zz.baidu.com/urls?site=www.'.$domain.'&token='.config('app.diy.baidutoken');
        $ch=curl_init();
        $options=array(
            CURLOPT_URL=>$api,
            CURLOPT_POST=>true,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_POSTFIELDS=>implode("\n",$urls),
            CURLOPT_HTTPHEADER=>array('Content-Type: text/plain'),
            CURLOPT_INTERFACE=>$ip,
            CURLOPT_CONNECTTIMEOUT=>3,
            CURLOPT_TIMEOUT=>6
        );
        curl_setopt_array($ch,$options);
        $source=curl_exec($ch);
        curl_close($ch);
        return $source;
    }
    //生成随机字符串
    protected function randStr($len){
        $chars=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9"];
        shuffle($chars);//打乱数组顺序
        $str='';
        for($i=0;$i<(int)$len;$i++){
            $str=$str.$chars[mt_rand(0,count($chars)-1)];//随机取出一位
        }
        return $str;
    }
    protected function curl($aims){
        $user_agent="Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)";
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',$aims));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);//在HTTP请求中包含一个”user-agent”头的字符串。
        $source=curl_exec($ch);
        curl_close($ch);
        return $source;
    }
    protected function changeCoding($template){
        $codingType=mb_detect_encoding($template,array('UTF-8','GBK','LATIN1','GB2312'));//mb_detect_encoding() 函数来判断字符串是什么编码的
        return mb_convert_encoding($template,'utf-8',$codingType);
    }
}
