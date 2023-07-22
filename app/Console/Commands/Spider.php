<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Spider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:spider';

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
        $user_agent="Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)";
        header("content-type:text/html; charset=utf-8");
        $url=config('app.diy.gettitle')[0];
        $num=config('app.diy.gettitle')[1];
        $ip=file_get_contents(public_path('ip.txt'));
        $ip=explode("\r\n",$ip);
        $index=array_search('IP用完',$ip);
        array_splice($ip,$index,1);
        for($i=0;$i<$num;$i++){
            $link=$this->randStr(mt_rand(4,8)).'.'.$url;
            $domain='http://'.$link;
            $ch=curl_init();//初始化
            curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',$domain));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
            curl_setopt($ch,CURLOPT_ENCODING,'');
            curl_setopt($ch,CURLOPT_MAXREDIRS,10);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
            curl_setopt($ch,CURLOPT_TIMEOUT,6);
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);//在HTTP请求中包含一个”user-agent”头的字符串。
            curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
            curl_setopt($ch,CURLOPT_HTTPHEADER,[
                'Accept-Language: zh-CN,zh;q=0.9',
                "Host: $link",
            ]);
            curl_setopt($ch,CURLOPT_INTERFACE,$ip[mt_rand(0,count($ip)-1)]);
            curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);//在HTTP请求中包含一个”user-agent”头的字符串。
            $source=curl_exec($ch);
            curl_close($ch);
            if(!$source){
                continue;
            }
            /*preg_match('/<title[\s\S]*>([\s\S]*)<\/title>/i',$source,$match);*/
            preg_match('/<title data-react-helmet="true">([\s\S]*)<\/title>/i',$source,$match);
            $handle=fopen(public_path('/ciyu.txt'),"a+");
            fwrite($handle,html_entity_decode($match[1])."\n");
            fclose($handle);
        }
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
}
