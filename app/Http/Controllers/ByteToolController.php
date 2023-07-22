<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Overtrue\Pinyin\MemoryFileDictLoader;
use Overtrue\Pinyin\Pinyin;

class ByteToolController extends Controller{
    private $header;
    private $domain;
    private $pinyin;
    public function __construct(){
        $universal=file(Storage::disk('local')->path('txtinfo/universal.txt'));
        $this->domain=str_replace("\r",'',str_replace("\n",'',$universal));
        $this->header=[
            'accept: */*',
            'accept-encoding: gzip',
            'accept-language: zh-CN,zh;q=0.9',
            'content-type: application/json',
            'cookie: _S_IPAD=0; tt_webid=7021511094086977061; _S_UA=Mozilla%2F5.0%20(iPhone%3B%20CPU%20iPhone%20OS%2013_2_3%20like%20Mac%20OS%20X)%20AppleWebKit%2F605.1.15%20(KHTML%2C%20like%20Gecko)%20Version%2F13.0.3%20Mobile%2F15E148%20Safari%2F604.1; FRM=new; PIXIEL_RATIO=3.0000001192092896; WIN_WH=375_812; passport_csrf_token_default=2536da79009c11550e619b82df2ce23a; passport_csrf_token=2536da79009c11550e619b82df2ce23a; _tea_utm_cache_2018=undefined; MONITOR_WEB_ID=b206cf67-cda2-4675-80b1-5e120503d233; _S_DPR=1.25; _S_WIN_WH=1536_754; toutiao_sso_user=17aac663a716b991da713592ee348f6b; toutiao_sso_user_ss=17aac663a716b991da713592ee348f6b; output_sid=cf4b71cefa9d0814928dee8de2e1030a; ttwid=1%7CkGkpRQIoENoOwIQEDnHq0xc4ivdosmtBGPHzo6lJals%7C1635169414%7Cbd00b12b883b1260f69f17d05bbfcf565fa574eaa927b6326b1e322a437e36b1; s_v_web_id=kv6pnh30_lYMZ0bJr_Y6OZ_44bP_9VsN_586vpAFvHzvL; ttcid=e13e13ad4cff419fbc75140d6a660be417; sso_uid_tt_ss=8b3386b4c642f535d2d7c4ff285efa1d; sso_uid_tt=8b3386b4c642f535d2d7c4ff285efa1d; uid_tt=a71db7f176e77ec1d5f1a5e1ff77ca58; uid_tt_ss=a71db7f176e77ec1d5f1a5e1ff77ca58; sid_tt=6f508a3edd75627bba56b3c69ae81ffe; sessionid=6f508a3edd75627bba56b3c69ae81ffe; sessionid_ss=6f508a3edd75627bba56b3c69ae81ffe; sid_ucp_v1=1.0.0-KDc2NjVmOGE2YjNjMTQyODU5NjY5Njk4NWFkY2E0YWE5NDQzMTMwMWEKEQiuioDP9IyqBxCL79qLBhgYGgJsZiIgNmY1MDhhM2VkZDc1NjI3YmJhNTZiM2M2OWFlODFmZmU; ssid_ucp_v1=1.0.0-KDc2NjVmOGE2YjNjMTQyODU5NjY5Njk4NWFkY2E0YWE5NDQzMTMwMWEKEQiuioDP9IyqBxCL79qLBhgYGgJsZiIgNmY1MDhhM2VkZDc1NjI3YmJhNTZiM2M2OWFlODFmZmU; sid_guard=6f508a3edd75627bba56b3c69ae81ffe%7C1635170187%7C3024000%7CMon%2C+29-Nov-2021+13%3A56%3A27+GMT',
            'origin: https://zhanzhang.toutiao.com',
            'referer: https://zhanzhang.toutiao.com/page/inner/site/add',
        ];
        $this->pinyin=new Pinyin(MemoryFileDictLoader::class);
    }
    //添加URL提交
    protected function addUrl(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $path='cache/'.$d.'/Bytespider/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                for($j=0;$j<20;$j++){
                    $url=[];
                    for($i=0;$i<100;$i++){
                        array_push($url,'http:'.$this->urlformat($d));
                    }
                    $data=[
                        'clientInfo'=>[
                            'browser_la nguage'=>'zh-CN',
                            'browser_name'=>'Mozilla',
                            'browser_online'=>true,
                            'browser_platform'=>'Win32',
                            'browser_version'=>'5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36',
                            'cookie_enabled'=>true,
                            'screen_height'=>'864',
                            'screen_width'=>'1536'
                        ],
                        'frequency'=>86400,
                        'site_id'=>$id[0],
                        'submitMethods'=>'url',
                        'urls'=>$url
                    ];
                    $data=str_replace("\\\\","\\",json_encode($data,320));
                    $curl=curl_init();
                    curl_setopt_array($curl,array(
                        CURLOPT_URL=>'https://zhanzhang.toutiao.com/webmaster/api/link/create',
                        CURLOPT_RETURNTRANSFER=>true,
                        CURLOPT_ENCODING=>'',
                        CURLOPT_MAXREDIRS=>10,
                        CURLOPT_FOLLOWLOCATION=>true,
                        CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST=>'POST',
                        CURLOPT_POSTFIELDS=>$data,
                        CURLOPT_TIMEOUT=>0,
                        CURLOPT_HTTPHEADER=>$this->header));
                    $response=curl_exec($curl);
                    curl_close($curl);
                    echo $response.$d."<br>";
                    flush();//刷新输出缓冲
                }
            }
        }
    }
    //添加sitemap
    protected function addSitemap(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $path='cache/'.$d.'/Bytespider/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                $data=[
                    'clientInfo'=>[
                        'browser_la nguage'=>'zh-CN',
                        'browser_name'=>'Mozilla',
                        'browser_online'=>true,
                        'browser_platform'=>'Win32',
                        'browser_version'=>'5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36',
                        'cookie_enabled'=>true,
                        'screen_height'=>'864',
                        'screen_width'=>'1536'
                    ],
                    'frequency'=>86400,
                    'site_id'=>$id[0],
                    'submitMethods'=>'sitemap',
                    'urls'=>[
                        'http://www.'.$d.'/sitemap.xml'
                    ]
                ];
                $data=str_replace("\\\\","\\",json_encode($data,320));
                $curl=curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL=>'https://zhanzhang.toutiao.com/webmaster/api/link/create',
                    CURLOPT_RETURNTRANSFER=>true,
                    CURLOPT_ENCODING=>'',
                    CURLOPT_MAXREDIRS=>10,
                    CURLOPT_FOLLOWLOCATION=>true,
                    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST=>'POST',
                    CURLOPT_POSTFIELDS=>$data,
                    CURLOPT_TIMEOUT=>0,
                    CURLOPT_HTTPHEADER=>$this->header));
                $response=curl_exec($curl);
                curl_close($curl);
                echo $response.$d."<br>";
                flush();//刷新输出缓冲
            }
        }
    }
    //得到站点的代码，并验证
    protected function getCode(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $path='cache/'.$d.'/Bytespider/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                $data=[
                    'id'=>(int)$id[0]
                ];
                $data=str_replace("\\\\","\\",json_encode($data,320));
                $curl=curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL=>"https://zhanzhang.toutiao.com/webmaster/api/site/getverify",
                    CURLOPT_RETURNTRANSFER=>true,
                    CURLOPT_ENCODING=>'',
                    CURLOPT_MAXREDIRS=>10,
                    CURLOPT_FOLLOWLOCATION=>true,
                    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST=>'POST',
                    CURLOPT_POSTFIELDS=>$data,
                    CURLOPT_TIMEOUT=>0,
                    CURLOPT_HTTPHEADER=>$this->header));
                $response=curl_exec($curl);
                curl_close($curl);
                if(!empty($response)){
                    $data=json_decode($response,true);
                    if(!empty($data)){
                        $code=$data['data'];
                        $handle=fopen(public_path('/ByteDanceVerify.html'),"w+");
                        fwrite($handle,$code);
                        fclose($handle);
                        $data=[
                            'id'=>(int)$id[0],
                            'verify_type'=>0
                        ];
                        $data=str_replace("\\\\","\\",json_encode($data,320));
                        $curl=curl_init();
                        curl_setopt_array($curl,array(
                            CURLOPT_URL=>"https://zhanzhang.toutiao.com/webmaster/api/site/verify",
                            CURLOPT_RETURNTRANSFER=>true,
                            CURLOPT_ENCODING=>'',
                            CURLOPT_MAXREDIRS=>10,
                            CURLOPT_FOLLOWLOCATION=>true,
                            CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST=>'POST',
                            CURLOPT_POSTFIELDS=>$data,
                            CURLOPT_TIMEOUT=>0,
                            CURLOPT_HTTPHEADER=>$this->header));
                        $response=curl_exec($curl);
                        curl_close($curl);
                        echo $response.$d."<br>";
                    }else{
                        echo '没成功';
                    }
                }else{
                    echo '没成功1';
                }
                flush();//刷新输出缓冲
            }
        }
    }
    //添加站点
    protected function  addSite(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $data=[
                'clientInfo'=>[
                    'browser_la nguage'=>'zh-CN',
                    'browser_name'=>'Mozilla',
                    'browser_online'=>true,
                    'browser_platform'=>'Win32',
                    'browser_version'=>'5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36',
                    'cookie_enabled'=>true,
                    'screen_height'=>'864',
                    'screen_width'=>'1536'
                ],
                'host'=>'www.'.$d,
                'protocol'=>'http'
            ];
            $data=str_replace("\\\\","\\",json_encode($data,320));
            $curl=curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL=>'https://zhanzhang.toutiao.com/webmaster/api/site/create',
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>'',
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_FOLLOWLOCATION=>true,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>'POST',
                CURLOPT_POSTFIELDS=>$data,
                CURLOPT_TIMEOUT=>0,
                CURLOPT_HTTPHEADER=>$this->header));
            $response=curl_exec($curl);
            curl_close($curl);
            if(!empty($response)){
                $data=json_decode($response,true);
                if(!empty($data)){
                    $id=$data['data']['id'];
                    $path='cache/'.$d.'/Bytespider/id.txt';
                    Storage::disk('local')->put($path,$id);
                    echo $id;
                }else{
                    echo '没成功';
                }
            }else{
                echo '没成功1';
            }
            echo $d."<br>";
            flush();//刷新输出缓冲
        }
    }
    //删除站点
    protected function delSite(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $path='cache/'.$d.'/Bytespider/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                $data=[
                    'id'=>$id[0]
                ];
                $data=str_replace("\\\\","\\",json_encode($data,320));
                $curl = curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL => 'https://zhanzhang.toutiao.com/webmaster/api/site/delete',
                    CURLOPT_RETURNTRANSFER=>true,
                    CURLOPT_ENCODING=>'',
                    CURLOPT_MAXREDIRS=>10,
                    CURLOPT_FOLLOWLOCATION=>true,
                    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST=>'POST',
                    CURLOPT_POSTFIELDS => $data,
                    CURLOPT_TIMEOUT=>0,
                    CURLOPT_HTTPHEADER =>$this->header));
                $response = curl_exec($curl);
                curl_close($curl);
                echo $response.$d."<br>";
                flush();//刷新输出缓冲
            }
        }
    }
    //url得随机字符
    protected function urlformat($firstDomain){
        $port=$_SERVER['SERVER_PORT'];
        $randPort='';
        if((int)$port!==80){
            $randPort=':'.mt_rand(config('app.diy.port')[0],config('app.diy.port')[1]);
        }
        $address=config('app.diy.address');
        $urlformat=config('app.diy.urlformat')['Bytespider'];
        $format=$urlformat[mt_rand(0,count($urlformat)-1)];
        preg_match_all('/{.*?}/',$format,$matches);
        foreach($matches[0] as $match){
            if($match==='{address}'&&!empty($address)){
                //循环数组得数字是否存在文件;
                $where=$address[mt_rand(0,count($address)-1)];
                $wherePy=implode('',$this->pinyin->convert($where,PINYIN_NO_TONE));
            }elseif($match==='{time}'){
                $wherePy=date('Ymd');
            }else{
                preg_match('/\d+/',$match,$num);
                $wherePy=$this->randStr($num[0]);
            }
            $format=preg_replace('/'.'\\'.$match.'/',$wherePy,$format,1);
        }
        $format=str_replace('Y',$firstDomain.$randPort,$format);
        return str_replace('HOST','www.'.$firstDomain.$randPort,$format);
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
