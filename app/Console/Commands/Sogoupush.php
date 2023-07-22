<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Sogoupush extends Command
{
    private $code;//验证码
    private $id;//验证码id
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sogoupush {domain} {type=lz}';

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
        $type=$this->argument('type');
        $firstDomain=$this->argument('domain');
        $cookie='IPLOC=PH; SUID=250A5F778935990A0000000060C3143A; SUV=1623397441134474; front_screen_resolution=1920*1080; front_screen_dpi=1.25; CXID=50B351EAC79B3BE1C213FAF434022161; __ZHANZHANG_SID__=EcbzeJ9BjUvwQugbBYVnpVg0QzN6Yek5; __ZHANZHANG_SID__.sig=wzai0ENMZM49nmbCWvO7FFrF_Ws; UM_distinctid=17a18c354df7c0-038757d47e91e4-d7e1938-144000-17a18c354e0b04; username=934726185; username.sig=YF7swqupnD955ueu0i4JyRms6l0; user_id=4808833; user_id.sig=mpO-VngCplsPRx4ZBMEQTbKJp74; SNUID=E9C693BACDC8084D5E011CB7CDA31EE5; wuid=AAHc88f1NgAAAAqgKhdcyQEAkwA=; FREQUENCY=1623397450362_799; ld=WZllllllll2kZeSRlllllpRgBJclllllNCD3JylllVGlllllpklll5@@@@@@@@@@';
        $array=[];
        for($i=130;$i<159;$i++){
            array_push($array,'154.213.143.'.$i);
        }
        for($i=226;$i<255;$i++){
            array_push($array,'154.213.144.'.$i);
        }
        for($i=194;$i<223;$i++){
            array_push($array,'154.213.145.'.$i);
        }
        for($i=226;$i<255;$i++){
            array_push($array,'154.213.146.'.$i);
        }
        for($i=66;$i<95;$i++){
            array_push($array,'154.213.147.'.$i);
        }
        for($i=130;$i<159;$i++){
            array_push($array,'154.213.158.'.$i);
        }
        for($i=34;$i<39;$i++){
            array_push($array,'45.142.76.'.$i);
        }
        for($i=34;$i<63;$i++){
            array_push($array,'192.145.22.'.$i);
        }
        for($i=130;$i<159;$i++){
            array_push($array,'154.213.140.'.$i);
        }
        foreach($array as $ip){
            for($j=0;$j<2;$j++){
                $this->getInfo($cookie,$ip);
                //保存最新的搜狗的验证码 到public/pic.png
                if(!$this->saveVerification($cookie,$ip)){
                    echo '代码为空';
                    continue;
                }
                sleep(1);
                if($type==='cjy'){
                    //超级鹰账号信息
                    $user='dami123';//超级鹰用户账号
                    $pass=md5('dami123456');//经过md5加密的密码
                    $softid='918441';//软件ID 用户中心>软件ID 可以生成
                    $codetype='1902';//码图类型,查看更多类型 https://www.chaojiying.com/price.html
                    $str=$this->CJY_RecognizeBytes($user,$pass,$softid,$codetype);
                }
                if($type==='lz'){
                    $str=$this->lz_upload();
                }
                sleep(1);
                if($str==='未识别'){
                    echo "93行没识别";
                    continue;
                }
                $domain=[];
                for($i=0;$i<20;$i++){
                    array_push($domain,'http://'.$this->randStr(mt_rand(4,8)).'.'.$firstDomain);
                }
                $str='';
                foreach($domain as $v){
                    $str=$str.$v.'\n';
                }
                $data=[
                    'code'=>$this->code,
                    'email'=>'gxlhx@163.com',
                    'reason'=>'我就是想提交这个域名，这里面内容真的很丰富，为什么不行呢',
                    'site_type'=>"2",
                    'sites'=>$domain,
                    'urls'=>substr($str,0,-2)
                ];
                $data=str_replace("\\\\","\\",json_encode($data,320));
                $header=[
                    "Accept:application/json, text/plain, */*",
                    "Accept-Encoding:gzip, deflate, br",
                    "Accept-Language:zh-CN,zh;q=0.9",
                    "Connection:keep-alive",
                    "Content-Length:".strlen($data),
                    "Content-Type:application/json;charset=UTF-8",
                    "Cookie:$cookie",
                    "Host:zhanzhang.sogou.com",
                    "Origin:https://zhanzhang.sogou.com",
                    "Referer:https://zhanzhang.sogou.com/index.php/sitelink/index",
                    'sec-ch-ua:" Not A;Brand";v="99", "Chromium";v="90", "Google Chrome";v="90"',
                    "sec-ch-ua-mobile:?0",
                    "Sec-Fetch-Dest:empty",
                    "Sec-Fetch-Mode:cors",
                    "Sec-Fetch-Site:same-origin",
                    "User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36",
                ];
                $ch=curl_init();//初始化
                curl_setopt($ch,CURLOPT_URL,'https://zhanzhang.sogou.com/api/feedback/addMultiShensu');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
                curl_setopt($ch,CURLOPT_INTERFACE,$ip);
                curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
                curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
                curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);// stop verifying certificate
                curl_setopt($ch,CURLOPT_POST, true);
                curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3);
                $source=curl_exec($ch);
                curl_close($ch);
                if(preg_match('/验证码有误/',$source)&&$type==='cjy'){
                    $this->CJY_ReportError($user,$pass,$this->id,$softid);
                    echo "已报告错误";
                }
                if(preg_match('/验证码有误/',$source)&&$type==='lz'){
                    //需要自行判断结果是否正确，错误的结果才报错
                    echo $this->lz_post('error', array('yzm_id'=>$this->id));
                }
                if(preg_match('/anti校验失败/',$source)){
                    echo "校验失败";
                    break;
                }
                echo $source;
            }
        }
    }
    /*
     * 上传识别函数
     *
     * $yzm_img:[必填]图片相对路径，如'img/1.jpg'
     * $yzm_mark:[必填]识别类型
     * $yzm_minlen:[非必填]识别最小长度
     * $yzm_maxlen:[非必填]识别最大长度
     * $workerTipsId:[非必填]人工提示模板ID
     */
    public function lz_upload() {
        $userfile=public_path('pic.png');//注意PHP是否能正确取得图片数据，关注下PHP权限和图片路径  注意有时windows系统须要用到绝对路径
        //判断是否能读取到文件
        if (is_readable($userfile) == false) { die('文件不存在或者无法读取'); }
        set_time_limit(0);
        if(class_exists('CURLFile')) {
            $data_arr['upload']=new \CURLFile(realpath($userfile));
        }else {
            $data_arr['upload']='@'.realpath($userfile);
        }
        $data_arr['yzm_minlen']= 4;
        $data_arr['yzm_maxlen'] = 4;
        $data_arr['yzmtype_mark'] = 1001;
        $data_arr['worker_tips_id'] =null;
        return $this->lz_post('upload', $data_arr);
    }
    /*
     * curl模拟post提交函数
     */
    public function lz_post($type, $val = null) {
        $data['user_name'] ='ag3m888';
        $data['user_pw'] = 'Dami123456.';
        $data['zztool_token'] = '04653374e12a77cb562f548efe579f0c';
        if (is_array($val)) {
            $data = $data + $val;
        }
        $http = curl_init("http://v1-http-api.jsdama.com/api.php?mod=php&act={$type}");
        curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($http, CURLOPT_POST, 1);
        curl_setopt($http, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($http);
        curl_close($http);
        $json=json_decode($result,true);
        if(!$json['result']||!isset($json['data'])){
            return '未识别';
        }
        $this->code=$json['data']['val'];
        $this->id=$json['data']['id'];
    }
    //识别验证码
    //返回样例:{"err_no":0,"err_str":"OK","pic_id":1662228516102,"pic_str":"8vka","md5":"35d5c7f6f53223fbdc5b72783db0c2c0","str_debug":""}
    public function CJY_RecognizeBytes($user,$pass,$softid,$codetype){
        $userfile=public_path('pic.png');//注意PHP是否能正确取得图片数据，关注下PHP权限和图片路径  注意有时windows系统须要用到绝对路径
        //判断是否能读取到文件
        if (is_readable($userfile) == false) { die('文件不存在或者无法读取'); }
        $url = 'http://upload.chaojiying.net/Upload/Processing.php' ;
        $fields = array(
            'user'=>$user ,
            'pass2'=>$pass ,
            'softid'=>$softid ,
            'codetype'=>$codetype ,
            //'userfile'=>"@$userfile" ,  //注意,当PHP版本高于5.5后，此行可能无效要改为下一行
            'userfile'=> new \CURLFile(realpath($userfile)),
        );
        $ch=curl_init() ;
        curl_setopt($ch,CURLOPT_URL,$url) ;
        curl_setopt($ch,CURLOPT_POST,count($fields)) ;
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch,CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch,CURLOPT_REFERER,'') ;
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Expect:'));  //加入这行是为了让 curl 一次发送POST包,防止发送包里出现 Expect:100-continue 造成CDN节点返回417错误
        $result=curl_exec($ch);
        curl_close($ch) ;
        $reArray=json_decode($result,true);
        $this->code=$reArray["pic_str"];
        $this->id=$reArray["pic_id"];
        if(!$reArray["err_no"] == 0){
            return '未识别';
        }
    }
    public function getInfo($cookie,$ip){
        $header=[
            "Accept: application/json, text/plain, */*",
            "Accept-Encoding: gzip, deflate, br",
            "Accept-Language: zh-CN,zh;q=0.9",
            "Connection: keep-alive",
            "Cookie: $cookie",
            "Host: zhanzhang.sogou.com",
            "Referer: https://zhanzhang.sogou.com/index.php/sitelink/index",
            'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="90", "Google Chrome";v="90"',
            "sec-ch-ua-mobile: ?0",
            "Sec-Fetch-Dest: image",
            "Sec-Fetch-Mode: no-cors",
            "Sec-Fetch-Site: same-origin",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36"
        ];
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'https://zhanzhang.sogou.com/api/user/info');//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_INTERFACE,$ip);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3);
        curl_exec($ch);
        curl_close($ch);
    }
    public function saveVerification($cookie,$ip){
        $header=[
            "Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8",
            "Accept-Encoding: gzip, deflate, br",
            "Accept-Language: zh-CN,zh;q=0.9",
            "Connection: keep-alive",
            "Cookie: $cookie",
            "Host: zhanzhang.sogou.com",
            "Referer: https://zhanzhang.sogou.com/index.php/sitelink/index",
            'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="90", "Google Chrome";v="90"',
            "sec-ch-ua-mobile: ?0",
            "Sec-Fetch-Dest: image",
            "Sec-Fetch-Mode: no-cors",
            "Sec-Fetch-Site: same-origin",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36"
        ];
        $time=time().mt_rand(100,999);
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'https://zhanzhang.sogou.com/api/user/generateVerifCode?timer='.$time);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_INTERFACE,$ip);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3);
        $source=curl_exec($ch);
        curl_close($ch);
        $handle=fopen(public_path('/下载.svg'),"w+");
        fwrite($handle,$source);
        fclose($handle);
        sleep(3);
        if(!filesize(public_path('下载.svg'))){
            return 0;
        }
        $im =new \Imagick(public_path('下载.svg'));
        $svg = file_get_contents(public_path('下载.svg'));
        $svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'.$svg;
        $im->readImageBlob($svg);
        $im->setImageFormat("png24");
        $srcImage = $im->getImageGeometry(); //获取源图片宽和高
        $im->resizeImage($srcImage['width'], $srcImage['height'], \Imagick::FILTER_LANCZOS, 1, false);
        $im->writeImage(public_path('pic.png'));
        $im->clear();
        $im->destroy();
        return 1;
    }
    //报告错误,只在验证码识别结果是错误的时候使用该函数
    //返回样例:{"err_no":0,"err_str":"OK"}
    public function CJY_ReportError($user,$pass,$PicId,$SoftId){
        $url = 'http://code.chaojiying.net/Upload/ReportError.php' ;
        $fields = array(
            'user'=>$user ,
            'pass2'=>$pass ,
            'id'=>$PicId ,
            'softid'=>$SoftId ,
        );
        $ch = curl_init() ;
        curl_setopt($ch, CURLOPT_URL,$url) ;
        curl_setopt($ch, CURLOPT_POST,count($fields)) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch, CURLOPT_REFERER,'') ;
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        $result = curl_exec($ch);
        curl_close($ch) ;
        return $result ;
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
