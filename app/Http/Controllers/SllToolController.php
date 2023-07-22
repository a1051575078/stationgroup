<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SllToolController extends Controller{
    private $header;
    private $domain;
    private $user;				//超级鹰用户账号
    private $pass;              //经过md5加密的密码
    private	$softid;			//软件ID 用户中心>软件ID 可以生成
    private $codetype;			//码图类型,查看更多类型 https://www.chaojiying.com/price.html
    private $userfile;
    public function __construct(){
        $this->user='dami123';//超级鹰用户账号
        $this->pass=md5('dami123456');//经过md5加密的密码
        $this->softid='918441';//软件ID 用户中心>软件ID 可以生成
        $this->codetype='1004';//码图类型,查看更多类型 https://www.chaojiying.com/price.html
        $universal=file(Storage::disk('local')->path('txtinfo/universal.txt'));
        $this->domain=str_replace("\r",'',str_replace("\n",'',$universal));
        $this->header=[
            'Accept: application/json, text/plain, */*',
            'Accept-Encoding: gzip, deflate, br',
            'Accept-Language: zh-CN,zh;q=0.9',
            'Connection: keep-alive',
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: PHPSESSID=kg83kg4m40cgu0gsh41c791g85; QiHooGUID=2F971009D1AA192FC136938350A90A80.1645682241307; __guid=137774715.2423724716305573400.1645682244151.34; Qs_lvt_100433=1645682244; test_cookie_enable=null; Q=u%3D360H1631609779%26n%3D%26le%3DM3ufnUtyAQNkAwZhL29g%26m%3DWGWPAwZyZxRyZxRyZxRyZxRyZxRjZmZ%3D%26qid%3D1631609779%26im%3D1_t01923d359dad425928%26src%3Dpcw_so_zhanzhang%26t%3D1; __NS_Q=u%3D360H1631609779%26n%3D%26le%3DM3ufnUtyAQNkAwZhL29g%26m%3DWGWPAwZyZxRyZxRyZxRyZxRyZxRjZmZ%3D%26qid%3D1631609779%26im%3D1_t01923d359dad425928%26src%3Dpcw_so_zhanzhang%26t%3D1; T=s%3D750c47b6530af5f6a98304589ce96d02%26t%3D1645682353%26lm%3D%26lf%3D1%26sk%3Dc76a91b435c4e7cf7191376b99624c0a%26mt%3D1645682353%26rc%3D%26v%3D2.0%26a%3D1; __NS_T=s%3D750c47b6530af5f6a98304589ce96d02%26t%3D1645682353%26lm%3D%26lf%3D1%26sk%3Dc76a91b435c4e7cf7191376b99624c0a%26mt%3D1645682353%26rc%3D%26v%3D2.0%26a%3D1; Qs_pv_100433=4434166554785831400%2C2260333938419654000',
            'Host: zhanzhang.so.com',
            'Origin: https://zhanzhang.so.com',
            'Referer: https://zhanzhang.so.com/sitetool/site_manage',
        ];
    }
    //超级鹰全自动打码
    protected function cjySitemap(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach ($this->domain as $domain){
            $a='';
            $this->getVscode();
            $this->userfile=public_path('下载.png');//注意PHP是否能正确取得图片数据，关注下PHP权限和图片路径  注意有时windows系统须要用到绝对路径
            //判断是否能读取到文件
            if(is_readable($this->userfile) == false) { die('文件不存在或者无法读取'); }
            $result=$this->CJY_RecognizeBytes();
            $reArray=json_decode($result,true);
            if($reArray["err_no"] == 0){
                $vscode=$reArray["pic_str"];
                $curl = curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL => 'https://zhanzhang.so.com/?m=Sitemap&a=add&host=www.'.$domain,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => "seed=http%3A%2F%2Fwww.$domain%2Fsitemap.xml&code=$vscode",
                    CURLOPT_CONNECTTIMEOUT=>1,
                    CURLOPT_TIMEOUT=>2,
                    CURLOPT_HTTPHEADER =>$this->header));
                $response = curl_exec($curl);
                curl_close($curl);
                $r=json_decode($response,true);
                if(!$r){
                    $this->CJY_ReportError($reArray["pic_id"]);
                    echo $domain."-----------为空<br/>";
                    flush();//刷新输出缓冲
                    continue;
                }
                if($r['status']===-1){
                    $this->CJY_ReportError($reArray["pic_id"]);
                    $a='1';
                    echo $domain."-----------已报告错误<br/>";
                    flush();//刷新输出缓冲
                }
                if($r['status']===0){
                    $a='1';
                    echo $domain."成功<br/>";
                    flush();//刷新输出缓冲
                }
            }else{
                $a='1';
                echo $domain."-----------错误<br/>";
                flush();//刷新输出缓冲
            }
            if(!$a){
                echo $domain."-----------没执行到";
                dd($r);
            }
        }
        //return redirect('/360viewmap');
    }
    //超级鹰验证码识别错误
    protected function CJY_ReportError($PicId){
        $url = 'http://code.chaojiying.net/Upload/ReportError.php' ;
        $fields = array(
            'user'=>$this->user,
            'pass2'=>$this->pass,
            'id'=>$PicId,
            'softid'=>918441,
        );
        $ch=curl_init() ;
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
    //超级鹰
    protected function CJY_RecognizeBytes(){
        $url = 'http://upload.chaojiying.net/Upload/Processing.php' ;
        $fields = array(
            'user'=>$this->user ,
            'pass2'=>$this->pass ,
            'softid'=>$this->softid ,
            'codetype'=>$this->codetype ,
            //'userfile'=>"@$userfile",//注意,当PHP版本高于5.5后，此行可能无效要改为下一行
            'userfile'=> new \CURLFile(realpath($this->userfile)),
        );
        $ch = curl_init() ;
        curl_setopt($ch, CURLOPT_URL,$url) ;
        curl_setopt($ch, CURLOPT_POST,count($fields)) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($ch, CURLOPT_REFERER,'') ;
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3') ;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));  //加入这行是为了让 curl 一次发送POST包,防止发送包里出现 Expect:100-continue 造成CDN节点返回417错误
        $result = curl_exec($ch);
        curl_close($ch) ;
        return $result ;
    }
    //更新地图
    protected function updateMap(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => 'https://zhanzhang.so.com/?m=Sitemap&a=ping&host=www.'.$d,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => "seed=http://www.$d/sitemap.xml",
                CURLOPT_CONNECTTIMEOUT=>1,
                CURLOPT_TIMEOUT=>2,
                CURLOPT_HTTPHEADER =>$this->header));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response.$d."<br/>";
            flush();//刷新输出缓冲
        }
    }
    //获取验证码文件
    public function getVscode(){
        //ob_end_clean();手动需要打开
        //header("Content-type:image/png");手动需要打开
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => 'https://zhanzhang.so.com/index.php?a=checkcode&m=Utils&t='.time().mt_rand(100,999),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_CONNECTTIMEOUT=>5,
            CURLOPT_TIMEOUT=>10,
            CURLOPT_HTTPHEADER =>$this->header));
        $response = curl_exec($curl);
        curl_close($curl);
        $handle=fopen(public_path('/下载.png'),"w+");
        fwrite($handle,$response);
        fclose($handle);
    }
    //添加sitemap
    protected function sitemap(Request $request){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $domain=$request['domain'];
        $vscode=$request['vscode'];
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => 'https://zhanzhang.so.com/?m=Sitemap&a=add&host=www.'.$domain,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "seed=http%3A%2F%2Fwww.$domain%2Fsitemap.xml&code=$vscode",
            CURLOPT_CONNECTTIMEOUT=>1,
            CURLOPT_TIMEOUT=>2,
            CURLOPT_HTTPHEADER =>$this->header));
        $response = curl_exec($curl);
        curl_close($curl);
        $r=json_decode($response,true);
        if(!empty($r['info'])){
            echo $r['info'];
            return redirect('/360viewmap');
        }else{
            echo "重新来";
        }
        //return redirect('/360viewmap');
    }
    //删除文件
    protected function delVerify(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $linshi=file_get_contents(public_path('/linshi.txt'));
        $linshi=explode(PHP_EOL,$linshi);
        $linshi=str_replace("\r",'',$linshi);
        unlink(public_path('/linshi.txt'));
        foreach($linshi as $match){
            if(file_exists(public_path('/'.$match.'.txt'))){
                unlink(public_path('/'.$match.'.txt'));
                echo $match."<br>";
                flush();//刷新输出缓冲
            }
        }
    }
    //验证站点
    protected function verify(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => 'https://zhanzhang.so.com/?m=Site&a=auth',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => "site=www.{$d}&auth_method=file",
                CURLOPT_TIMEOUT=>5,
                CURLOPT_HTTPHEADER =>$this->header));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response.$d."<br>";
            flush();//刷新输出缓冲
        }
    }
    //获取站点代码验证
    protected function getCode(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $verify=[];
        foreach($this->domain as $d){
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => 'https://zhanzhang.so.com/?m=Site&a=get_auth_html&html=www.'.$d,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_CONNECTTIMEOUT=>1,
                CURLOPT_TIMEOUT=>5,
                CURLOPT_HTTPHEADER =>$this->header));
            $response = curl_exec($curl);
            curl_close($curl);
            if(!empty($response)){
                $data=json_decode($response,true);
                if(!empty($data)){
                    $label=htmlspecialchars($data['data']);
                    echo $label;
                    preg_match('/content=&quot;(\w+)&quot;/i',$label,$match);
                    $handle=fopen(public_path('/'.$match[1].'.txt'),"w+");
                    fwrite($handle,$match[1]);
                    fclose($handle);
                    array_push($verify,$match[1]."\n");
                    echo $match[1].'-------'.$d."<br>";
                    $handle=fopen(public_path('/linshi.txt'),"a+");
                    fwrite($handle,$match[1]."\r\n");
                    fclose($handle);
                }else{
                    echo $d."<br>";
                }
            }else{
                echo $d."<br>";
            }
            flush();//刷新输出缓冲
        }
        //file_put_contents(public_path('/linshi.txt'), print_r($verify, true));
    }
    //添加站点
    protected function addSite(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => 'https://zhanzhang.so.com/?m=Site&a=add',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'site=www.'.$d,
                CURLOPT_CONNECTTIMEOUT=>1,
                CURLOPT_TIMEOUT=>2,
                CURLOPT_HTTPHEADER =>$this->header));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response.$d."<br>";
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
            $site=json_encode(['roleId'=>0,'siteName'=>'www.'.$d]);
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => 'https://zhanzhang.so.com/?m=Site&a=delete',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => "sites_delete=[$site]",
                CURLOPT_CONNECTTIMEOUT=>1,
                CURLOPT_TIMEOUT=>2,
                CURLOPT_HTTPHEADER =>$this->header));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response.$d."<br>";
            flush();//刷新输出缓冲
        }
    }
}
