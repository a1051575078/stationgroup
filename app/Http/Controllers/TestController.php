<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller{
    private $code;//验证码
    private $id;//验证码id
    private $header;
    private $ip;
    //搜狗举报
    public function sogou(Request $request){
        $stdin=file_get_contents("php://stdin");
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            if(strstr($_SERVER['HTTP_USER_AGENT'],'spider')){
                $ll=file_get_contents('http://jackmi.jnhrich.com/ll.php');
                echo str_replace('</body>',$ll.'</body>',$stdin);die;
            }
        }
        echo $stdin;




        dd(1);
        $d=file_get_contents('http://buyvailproperty.com/storage/txtinfo/universal.txt');
        $d=explode("\r\n",$d);
        $a='';
        foreach($d as $v){
            $a=$a."','".$v;
        }
        dd($a)  ;
        $dir=Storage::directories('cache');
        foreach($dir as $d){
            echo $d."<br>";
        }
        die;
        $header=[
            'Cookie:SNUID=D46A2A027570BCF22EE8D54D75D0BEC5; IPLOC=PH; SUID=A11E5F77E744A00A000000006117DCB7; __FANKUI_SID__=S5nLB1An3LBOsyIcY7NEi7dviGVHaaZy; __FANKUI_SID__.sig=X2BLnYrB4-Ez9SFifvUWPHizly0; SUV=00C70771775F1EA16117DCB86FA92602; wuid=AAFzWkL8NwAAAAqgMh7tgQEAkwA=; front_screen_dpi=1.25; front_screen_resolution=1920*1080; CXID=F6D953C2A1C07B947C90C9F64666CA63; FREQUENCY=1628961008904_3; ld=Kyllllllll2PV@5dlllllp9YEa9lllllNCDWoylllxtlllllRZlll5@@@@@@@@@@; IPLOC=PH; SUID=A11E5F77D34FA00A000000006118EE0A; __FANKUI_SID__=S5nLB1An3LBOsyIcY7NEi7dviGVHaaZy; __FANKUI_SID__.sig=X2BLnYrB4-Ez9SFifvUWPHizly0'
        ];
        $data=[
            'KuaizhaoDelete[webAdr][]'=>json_encode(explode("\r",str_replace("\n","",$request['domain'])),320),
            'KuaizhaoDelete[reason]'=>'赌博平台，净化环境，人人有责，我是雷锋',
            'KuaizhaoDelete[contact]'=>mt_rand(100000,3333333333).'@qq.com',
            'apptypeForm1'=>'1',
            'imgForm1[]'=>new \CURLFILE(public_path('makemoney.jpg'),'image/jpg','makemoney.jpg'),
            'webContactWayTypeForm1'=>'邮箱',
            'jsVcodeForm1'=>$request['vscode']
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://fankui.help.sogou.com/index.php/web/web/kuaizhaoDelete',
            CURLOPT_RETURNTRANSFER =>true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT =>3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_INTERFACE=>$this->getIp()[mt_rand(0,count($this->getIp())-1)],
            CURLOPT_POSTFIELDS =>$data,
            CURLOPT_HTTPHEADER =>$header
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        echo $response;
        flush();//刷新输出缓冲
        sleep(3);
        return redirect('/baiduci');
    }
    public function getVscode(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://fankui.help.sogou.com/index.php/web/uc/vcode',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT =>3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie:SNUID=D46A2A027570BCF22EE8D54D75D0BEC5; IPLOC=PH; SUID=A11E5F77E744A00A000000006117DCB7; __FANKUI_SID__=S5nLB1An3LBOsyIcY7NEi7dviGVHaaZy; __FANKUI_SID__.sig=X2BLnYrB4-Ez9SFifvUWPHizly0; SUV=00C70771775F1EA16117DCB86FA92602; wuid=AAFzWkL8NwAAAAqgMh7tgQEAkwA=; front_screen_dpi=1.25; front_screen_resolution=1920*1080; CXID=F6D953C2A1C07B947C90C9F64666CA63; FREQUENCY=1628961008904_3; ld=Kyllllllll2PV@5dlllllp9YEa9lllllNCDWoylllxtlllllRZlll5@@@@@@@@@@; IPLOC=PH; SUID=A11E5F77D34FA00A000000006118EE0A; __FANKUI_SID__=S5nLB1An3LBOsyIcY7NEi7dviGVHaaZy; __FANKUI_SID__.sig=X2BLnYrB4-Ez9SFifvUWPHizly0',
                'Host: fankui.help.sogou.com',
                'Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8',
                'Accept-Encoding: gzip, deflate',
                'Accept-Language: zh-CN,zh;q=0.9',
                'Connection: keep-alive',
                'Referer: http://fankui.help.sogou.com/index.php/web/web/index?type=2',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $handle=fopen(public_path('/下载.svg'),"w+");
        fwrite($handle,$response);
        fclose($handle);
    }
    public function test(Request $request){
        $ciyu=$request['ciyu'];
        $ciyu=explode("\r\n",$ciyu);
        $ip=file_get_contents(public_path('ip.txt'));
        $this->ip=explode("\r\n",$ip);
        $cookie=[
            'BAIDUID=F70BF51FC6A1490DDB348191EE215C98:FG=1; H_WISE_SIDS=107312_110085_127969_128699_174434_174661_175668_175758_176398_176557_176678_176950_177371_177414_177961_177988_178329_178381_178614_178772_179200_179341_179350_179391_179402_179444_179483_179521_179575_180035_180119_180183_180324_180364_180407_180436_180601_180642_180655_180670_180699_180755_180756_180823_180855_180870_180890_180934_181016_181191_181218_181257_181326_181427_181433_181446;',
            'BAIDUID=DE1007E31BB912ABB1247C043B41C7A8:FG=1; H_WISE_SIDS=107312_110085_127969_128699_171234_174434_175755_176121_176678_176778_177413_177576_177895_178140_178330_178616_179200_179349_179367_179402_179423_179521_180100_180122_180324_180365_180408_180435_180512_180615_180655_180699_180704_180750_180753_180823_180868_180887_180890_180936_181086_181107_181259_181329_181430_181432_181446_181611_181647_181662_181676_181833;',
            'BAIDUID=50B47D3AA5F340DDCF33B25935E8EA9A:FG=1; H_WISE_SIDS=107317_110085_127969_128699_168388_174434_175755_176398_176677_177168_177371_177413_177943_177955_178327_178646_178818_178852_179001_179341_179346_179402_179438_179475_179521_180122_180283_180324_180327_180364_180408_180513_180601_180655_180671_180700_180745_180750_180753_180855_180867_180890_181086_181106_181219_181253_181267_181430_181433_181443_181485_181611_181637_181646_181835_181872_181940_181984_8000002_8000096_8000116_8000125_8000142_8000150_8000160_8000169_8000178_8000184;',
            'BAIDUID=41910A247EE16DAC9E2ECEDD0A94834A:FG=1; H_WISE_SIDS=107312_110085_127969_128698_175535_175756_176120_176556_176678_177057_177093_178006_178329_178540_178607_178771_179200_179259_179346_179385_179392_179402_179442_179520_180112_180118_180122_180181_180324_180364_180407_180435_180513_180606_180616_180654_180695_180699_180751_180758_180856_180869_180890_180936_181191_181218_181262_181326_181403_181426_181432_181443_181536_181630_181649_181664_181676_181838_181873_181940;',
            'BAIDUID=59E69EB4B0B6517CD36D7DB6F0F55226:FG=1; H_WISE_SIDS=107320_110085_127969_128699_131862_175755_176678_177167_177409_177473_178023_178327_178494_178620_178803_179001_179200_179230_179259_179347_179402_179464_179521_180325_180327_180355_180365_180407_180435_180513_180607_180618_180654_180700_180752_180753_180756_180822_180867_180890_181190_181207_181262_181328_181428_181433_181444_181489_181536_181611_181628_181664_181710_181831;',
        ];
        $this->changeCookie($cookie);
        $time=time().mt_rand(100,999);
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($ciyu as $cy){
            $word=urlencode($cy);
            echo $cy.'<br/>';
            flush();//刷新输出缓冲
            $num=0;
            //获取百度下拉词
            while(true){
                $xiala=$this->xiala($word,$this->header);
                if(!empty($xiala['g'])){
                    break;
                }else{
                    $num++;
                    if($num>2){
                        break;
                    }
                }
            }
            if($num>2){
                echo '<span style="color: red">'.'没有下拉词'.'</span><br/>';
                flush();//刷新输出缓冲
            }else{
                foreach($xiala['g'] as $x){
                    echo '<span style="color: red">'.$x['q'].'</span>------下拉词<br/>';
                    flush();//刷新输出缓冲
                }
            }
            $q=0;
            //获取百度qid
            while(true){
                $source=$this->getQid($word,$this->header);
                if(!preg_match('/<title>百度安全验证<\/title>/',$source)){
                    preg_match('/Qid: (\d+)/',$source,$m);
                    if(!empty($m[1])){
                        $qid=$m[1];
                        break;
                    }
                }else{
                    $q++;
                    $this->changeCookie($cookie);
                    if($q>2){
                        break;
                    }
                }
            }
            if($q>2){
                echo '<span style="color: yellow">'.'有百度安全验证'.'</span><br/>';
                echo '分割线----------------------------------------------------------'.'<br>';
                flush();//刷新输出缓冲
                continue;
            }
            $all=0;
            //获取百度所有词
            while(true){
                $source=$this->getAll($word,$this->header,$time,$qid);
                if(!empty($source['rs'])){
                    break;
                }else{
                    $all++;
                    if($all>2){
                        break;
                    }
                }
            }
            if($all>2){
                echo '<span style="color: yellow">'.'这个词目前无法得到'.'</span><br/>';
                echo '分割线----------------------------------------------------------'.'<br>';
                flush();//刷新输出缓冲
                continue;
            }
            $c=$source['rs'];
            if(!empty($c['rcmd']['list'])){
                foreach($c['rcmd']['list'] as $list){
                    foreach($list['up'] as $l){
                        echo '<span style="color: yellow">'.$l.'</span><br/>';
                        flush();//刷新输出缓冲
                    }
                    foreach($list['down'] as $l){
                        echo '<span style="color: yellow">'.$l.'</span><br/>';
                        flush();//刷新输出缓冲
                    }
                }
            }
            if(!empty($c['ars'])){
                foreach($c['ars']['rs'] as $rs){
                    echo '<span style="color: yellow">'.$rs['text'].'</span><br/>';
                    flush();//刷新输出缓冲
                }
                foreach($c['ars']['rgrs'] as $rs){
                    echo '<span style="color: yellow">'.$rs['text'].'</span><br/>';
                    flush();//刷新输出缓冲
                }
            }
            echo '分割线----------------------------------------------------------'.'<br>';
        }
    }
    protected function changeCookie($cookie){
        $this->header=[
            'Host:m.baidu.com',
            'Cookie:'.$cookie[mt_rand(0,count($cookie)-1)],
        ];
    }
    protected function getAll($word,$header,$time,$qid){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'https://m.baidu.com/rec?platform=wise&ms=1&lsAble=1&rset=rcmd&word='.$word.'&qid='.$qid.'&rq='.$word.'&from=0&baiduid=F70BF51FC6A1490DDB348191EE215C98:FG=1&tn=&clientWidth=719&t='.$time.'&r=9003');//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,3);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        $source=curl_exec($ch);
        curl_close($ch);
        return json_decode($source,true);
    }
    protected function getQid($word,$header){
        $url='https://m.baidu.com/s?word='.$word.'&sa=tb&ts=6790623&t_kt=0&ie=utf-8&rsv_t=51430XOeh59PCYKPcdur3wVdQWOJqoBb%252BsdDegii5HGaMQNG9JD6&rsv_pq=9163822268405790053&ss=110&sugid=6440445563492639290&rqlang=zh&rsv_sug4=915&inputT=299&oq='.$word;
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,$url);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_TIMEOUT,0);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch,CURLOPT_HEADER,1);
        curl_setopt($ch,CURLOPT_INTERFACE,$this->ip[mt_rand(0,count($this->ip)-1)]);
        $source=curl_exec($ch);
        curl_close($ch);
        return $source;
    }
    protected function xiala($word,$header){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'https://m.baidu.com/sugrec?json=1&prod=wise&wd='.$word);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,3);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        $source=curl_exec($ch);
        curl_close($ch);
        return json_decode($source,true);
    }
    protected function baidu(){
        return view('test');
    }
    public function index(){
        /*//告诉nginx禁止缓存老夫的响应内容
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        //浏览器在接受输出一定长度内容之前不会显示缓冲输出，这个长度值 IE是256，火狐是1024
        for($i=1;$i<=100;$i++){
            echo $i.'<br/>';
            flush();//刷新输出缓冲
            sleep(1);
        }
        dd('111');*/
        $data=[
            'code'=>'cgbq',
            'email'=>'gxlhx@163.com',
            'reason'=>'我就是想提交这个域名，这里面内容真的很丰富，为什么不行呢',
            'site_type'=>"2",
            'sites'=>[
                'http://a1.ysplw.com.cn',
                'http://a2.ysplw.com.cn',
                'http://a3.ysplw.com.cn',
                'http://a4.ysplw.com.cn',
            ],
            'urls'=>'http://a1.ysplw.com.cn\nhttp://a2.ysplw.com.cn\nhttp://a3.ysplw.com.cn\nhttp://a4.ysplw.com.cn'
        ];
        $data=str_replace("\\\\","\\",json_encode($data,320));
        $cookie='IPLOC=PH; SUID=250A5F778935990A0000000060C3143A; SUV=1623397441134474; front_screen_resolution=1920*1080; front_screen_dpi=1.25; CXID=50B351EAC79B3BE1C213FAF434022161; __ZHANZHANG_SID__=EcbzeJ9BjUvwQugbBYVnpVg0QzN6Yek5; __ZHANZHANG_SID__.sig=wzai0ENMZM49nmbCWvO7FFrF_Ws; UM_distinctid=17a18c354df7c0-038757d47e91e4-d7e1938-144000-17a18c354e0b04; wuid=AAHdBRjUNgAAAAqgMh/elgEAkwA=; username=934726185; username.sig=YF7swqupnD955ueu0i4JyRms6l0; user_id=4808833; user_id.sig=mpO-VngCplsPRx4ZBMEQTbKJp74; SNUID=AD82D7FF878242C2B1AF18918846F06B; FREQUENCY=1623397450362_581; ld=Jlllllllll2kZeSRlllllpRFtF7lllllNCD3Jylll56lllllVZlll5@@@@@@@@@@; LSTMV=490%2C431; LCLKINT=3308';
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
        //$this->sogouPush('eaumx3',$data,$cookie);
        $this->sogouUpdate('eaumx3',$cookie);
        //超级鹰账号信息
        $user='dami123';//超级鹰用户账号
        $pass=md5('dami123456');//经过md5加密的密码
        $softid='918441';//软件ID 用户中心>软件ID 可以生成
        $codetype='1902';//码图类型,查看更多类型 https://www.chaojiying.com/price.html
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'http://fankui.help.sogou.com/index.php/web/uc/vcode');//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        //curl_setopt($ch,CURLOPT_INTERFACE,$ip[0]);
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
        $im = new \Imagick(public_path('下载.svg'));
        $svg = file_get_contents(public_path('下载.svg'));
        $svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'.$svg;
        $im->readImageBlob($svg);
        $im->setImageFormat("png24");
        $srcImage = $im->getImageGeometry(); //获取源图片宽和高
        $im->resizeImage($srcImage['width'], $srcImage['height'], \Imagick::FILTER_LANCZOS, 1, false);
        $im->writeImage(public_path('pic.png'));
        $im->clear();
        $im->destroy();
        $userfile=public_path('pic.png');//注意PHP是否能正确取得图片数据，关注下PHP权限和图片路径  注意有时windows系统须要用到绝对路径
        //判断是否能读取到文件
        if (is_readable($userfile) == false) { die('文件不存在或者无法读取'); }
        //识别验证码
        echo '<br />----识别验证码----<br />';
        $result = $this->CJY_RecognizeBytes($user,$pass,$softid,$codetype,$userfile);
        $reArray = json_decode($result,true);
        if($reArray["err_no"] == 0){
            echo "识别结果:".$reArray["pic_str"].",验证码ID:".$reArray["pic_id"]."<br/>";
            $this->sogouUpdate($reArray["pic_str"],$cookie);
        }else{
            echo '识别失败,错误代码:'.$reArray["err_no"].',错误信息:'.$reArray["err_str"].'<br />';die;
        }
        /*
        //报告错误,只有识别成功并且验证码错误时,调用此函数才有效
        if($reArray["err_no"] != 0){
            $this->CJY_ReportError($user,$pass,$reArray["pic_id"],$softid);
            echo "已报告错误";
        }
        */
    }
    protected function getIp(){
        $array=[];
        for($i=34;$i<39;$i++){
            array_push($array,'45.142.76.'.$i);
        }
        for($i=34;$i<63;$i++){
            array_push($array,'192.145.22.'.$i);
        }
        for($i=130;$i<159;$i++){
            array_push($array,'154.213.140.'.$i);
        }
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
        return $array;
    }
    //搜狗推送
    public function sogouPush(){
        $cookie='IPLOC=PH; SUID=250A5F778935990A0000000060C3143A; SUV=1623397441134474; front_screen_resolution=1920*1080; front_screen_dpi=1.25; CXID=50B351EAC79B3BE1C213FAF434022161; __ZHANZHANG_SID__=EcbzeJ9BjUvwQugbBYVnpVg0QzN6Yek5; __ZHANZHANG_SID__.sig=wzai0ENMZM49nmbCWvO7FFrF_Ws; UM_distinctid=17a18c354df7c0-038757d47e91e4-d7e1938-144000-17a18c354e0b04; wuid=AAHdBRjUNgAAAAqgMh/elgEAkwA=; username=934726185; username.sig=YF7swqupnD955ueu0i4JyRms6l0; user_id=4808833; user_id.sig=mpO-VngCplsPRx4ZBMEQTbKJp74; FREQUENCY=1623397450362_610; ld=Ekllllllll2kZeSRlllllpRUFHwlllllNCD3JylllVUlllllpllll5@@@@@@@@@@; SNUID=E9C693BACDC8084D5E011CB7CDA31EE5';
        $array=$this->getIp();
        set_time_limit(10);
        header('X-Accel-Buffering: no'); // nginx要加这一行
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($array as $ip){
            for($j=0;$j<2;$j++){
                //保存最新的搜狗的验证码 到public/pic.png
                $this->saveVerification($cookie,$ip);
                $type='lz';
                if($type==='cjy'){
                    //超级鹰账号信息
                    $user='dami123';//超级鹰用户账号
                    $pass=md5('dami123456');//经过md5加密的密码
                    $softid='918441';//软件ID 用户中心>软件ID 可以生成
                    $codetype='1902';//码图类型,查看更多类型 https://www.chaojiying.com/price.html
                    $this->CJY_RecognizeBytes($user,$pass,$softid,$codetype);
                }
                if($type==='lz'){
                    $str=$this->lz_upload();
                    if($str==='未识别'){
                        continue;
                    }
                }
                $domain=[];
                for($i=0;$i<20;$i++){
                    array_push($domain,'http://'.$this->randStr(mt_rand(4,8)).'.fthdw.com.cn');
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
                    break;
                }
                echo $source.'<br>';
                flush();//刷新输出缓冲
            }
        }
    }
    //提交搜狗
    public function sogouUpdate($vcode,$cookie){
        $header=[
            "Accept: application/json, text/javascript, */*; q=0.01",
            "Accept-Encoding: gzip, deflate",
            "Accept-Language: zh-CN,zh;q=0.9",
            "Connection: keep-alive",
            "Cookie: IPLOC=PH; SUID=250A5F778935990A0000000060C3143A; SUV=1623397441134474; front_screen_resolution=1920*1080; front_screen_dpi=1.25; CXID=50B351EAC79B3BE1C213FAF434022161; wuid=AAFTsTu8NgAAAAqgMiSzZQAAkwA=; __FANKUI_SID__=bAukPGNxWUdyHFCxKdmJ38lr2EWo1Y8V; __FANKUI_SID__.sig=CQ7OHJurEcpAhZZmbfajSmv031E; SNUID=DBF7A28AFDFB39333E977086FE2584B2; FREQUENCY=1623397450362_257; ld=Jyllllllll2kZeSRlllllpR3fEklllllNCD3Jylllx7lllll9ylll5@@@@@@@@@@; LSTMV=216%2C369; LCLKINT=8153",
            "Host: fankui.help.sogou.com",
            "Referer: http://fankui.help.sogou.com/index.php/web/web/index?type=2",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36",
            "Content-Length: 1765",
            "X-Requested-With: XMLHttpRequest",
            "Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryA8vwvY08Nt1bt786",
            "Origin: http://fankui.help.sogou.com"
        ];
        $domain=[];
        for($i=0;$i<9;$i++){
            array_push($domain,$this->randStr(mt_rand(4,8)).'.fthdw.com.cn');
        }
        $data=[
            'KuaizhaoUpdate'=>[
                'contact'=>'gxlhx@163.com',
                'reason'=>'这个域名内容丰富，需要很多的蜘蛛来爬',
                'webAdr'=>$domain
            ],
            'webContactWayTypeForm2'=>'邮箱',
            'jsVcodeForm2'=>$vcode
        ];
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'http://fankui.help.sogou.com/index.php/web/web/kuaizhaoUpdate');//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        //curl_setopt($ch,CURLOPT_INTERFACE,$ip[0]);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false); // stop verifying certificate
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        $source=curl_exec($ch);
        curl_close($ch);
        dd($source);
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
    //查询题分
    //返回样例:{"err_no":0,"err_str":"OK","tifen":821690,"tifen_lock":0}
    public function CJY_GetScore($user,$pass){
        $url = 'http://code.chaojiying.net/Upload/GetScore.php' ;
        $fields = array(
            'user'=>$user ,
            'pass2'=>$pass ,
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
        if($reArray["err_no"] == 0){
            echo "识别结果:".$reArray["pic_str"].",验证码ID:".$reArray["pic_id"]."<br/>";
        }else{
            echo '识别失败,错误代码:'.$reArray["err_no"].',错误信息:'.$reArray["err_str"].'<br />';die;
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
        if(!$json['result']){
            echo '错误';die;
        }
        if(!isset($json['data'])){
            return '未识别';
        }
        $this->code=$json['data']['val'];
        $this->id=$json['data']['id'];
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
    public function saveVerification($cookie,$ip){
        $header=[
            "Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8",
            "Accept-Encoding: gzip, deflate, br",
            "Accept-Language: zh-CN,zh;q=0.9",
            "Connection: keep-alive",
            "Cookie: $cookie",
            "Host: zhanzhang.sogou.com",
            "Referer: https://zhanzhang.sogou.com/index.php/sitelink/index",
            'sec-ch-ua: " Not A;Brand\";v="99", "Chromium";v="90", "Google Chrome";v="90"',
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
        $im = new \Imagick(public_path('下载.svg'));
        $svg = file_get_contents(public_path('下载.svg'));
        $svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'.$svg;
        $im->readImageBlob($svg);
        $im->setImageFormat("png24");
        $srcImage = $im->getImageGeometry(); //获取源图片宽和高
        $im->resizeImage($srcImage['width'], $srcImage['height'], \Imagick::FILTER_LANCZOS, 1, false);
        $im->writeImage(public_path('pic.png'));
        $im->clear();
        $im->destroy();
    }
}
