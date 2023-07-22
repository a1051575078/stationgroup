<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Overtrue\Pinyin\MemoryFileDictLoader;
use Overtrue\Pinyin\Pinyin;

class SogouToolController extends Controller{
    private $header;
    private $domain;
    private $pinyin;
    public function __construct(){
        $universal=file(Storage::disk('local')->path('txtinfo/universal.txt'));
        $this->domain=str_replace("\r",'',str_replace("\n",'',$universal));
        $this->header=[
            'Accept: application/json, text/plain, */*',
            'Accept-Encoding: gzip, deflate, br',
            'Accept-Language: zh-CN,zh;q=0.9',
            'Content-Type: application/json;charset=UTF-8',
            'Cookie: IPLOC=PH; SUID=A11E5F77E744A00A000000006117DCB7; SUV=00C70771775F1EA16117DCB86FA92602; front_screen_dpi=1.25; front_screen_resolution=1920*1080; CXID=F6D953C2A1C07B947C90C9F64666CA63; ssuid=1065701226; usid=0QAlmazSVCtNstHw; wuid=AAEBiHKZOgAAAAqgMiL7+QAAkwA=; FREQUENCY=1628961008904_1116; SGINPUT_UPSCREEN=1642076462925; SMYUV=1642927066245038; UM_distinctid=17e86158ce78b5-0e96e5fa9b5fcc-f791b31-144000-17e86158ce83f5; __ZHANZHANG_SID__=OD94xRcS7h3SEN_lXp0v6kw3WIuod0m5; __ZHANZHANG_SID__.sig=tXjtc0ml3K71sno3G0i2UqM-ZbY; username=934726185; username.sig=YF7swqupnD955ueu0i4JyRms6l0; user_id=4808833; user_id.sig=mpO-VngCplsPRx4ZBMEQTbKJp74; show_wxapp=0; SNUID=9BF1EF59292FF6120A1158DA2A9805F2; ld=Flllllllll2PV@5dYWx9tQ39uaOPc9SeNCDWoyllll7lllll9kllll9lllllllll',
            'Host: zhanzhang.sogou.com',
            'Origin: https://zhanzhang.sogou.com',
            'Referer: https://zhanzhang.sogou.com/index.php/dashboard/index',
        ];
        $this->pinyin=new Pinyin(MemoryFileDictLoader::class);
    }
    //得到站点所有信息
    protected function info(){
        $curl=curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL=>"https://zhanzhang.sogou.com/api/user/getWebList?status=",
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_ENCODING=>'',
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_FOLLOWLOCATION=>true,
            CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=>'GET',
            CURLOPT_TIMEOUT=>5,
            CURLOPT_CONNECTTIMEOUT=>3,
            CURLOPT_HTTPHEADER=>$this->header));
        $response=curl_exec($curl);
        curl_close($curl);
        $data=json_decode($response,true);
        if($data['msg']!=='success'){
            return '接口数据没获取到';
        }
        return $data['data']['list'];
    }
    //删除所有站点
    protected function delAllSite(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $data=$this->info();
        foreach($data as $v){
            $id=[
                'id'=>$v['site_id']
            ];
            $id=str_replace("\\\\","\\",json_encode($id,320));
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => 'https://zhanzhang.sogou.com/api/website/delWebsite',
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>'',
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_FOLLOWLOCATION=>true,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>'POST',
                CURLOPT_POSTFIELDS =>$id,
                CURLOPT_TIMEOUT=>5,
                CURLOPT_CONNECTTIMEOUT=>3,
                CURLOPT_HTTPHEADER =>$this->header));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response."<br>";
            flush();//刷新输出缓冲
        }
    }
    //获取验证码文件
    public function getVscode(){
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => 'https://zhanzhang.sogou.com/api/user/generateVerifCode?timer='.time().mt_rand(100,999),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_CONNECTTIMEOUT=>1,
            CURLOPT_TIMEOUT=>2,
            CURLOPT_HTTPHEADER =>$this->header));
        $response = curl_exec($curl);
        curl_close($curl);
        $handle=fopen(public_path('/下载.svg'),"w+");
        fwrite($handle,$response);
        fclose($handle);
    }
    //添加URL提交
    protected function addUrl(Request $request){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $domain=[];
        for($i=0;$i<20;$i++){
            array_push($domain,'http:'.$this->urlformat($request['domain']));
        }
        $str='';
        foreach($domain as $v){
            $str=$str.$v.'\n';
        }
        $path='cache/'.$request['domain'].'/Sogou/id.txt';
        $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
        if($isCache){
            $id=file(storage_path('app/public/'.$path));
            $data=[
                'code'=>$request['vscode'],
                'site_address'=>'www.'.$request['domain'],
                'site_id'=>$id[0],
                'url'=>'',
                'urlSubFlag'=>true,
                'urls'=>substr($str,0,-2)
            ];
            $data=str_replace("\\\\","\\",json_encode($data,320));
            $curl=curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL=>'https://zhanzhang.sogou.com/api/feedback/addMultiShensu',
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>'',
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_FOLLOWLOCATION=>true,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>'POST',
                CURLOPT_POSTFIELDS=>$data,
                CURLOPT_TIMEOUT=>5,
                CURLOPT_HTTPHEADER=>$this->header));
            $response=curl_exec($curl);
            curl_close($curl);
            echo $response."<br>";
            sleep(1);
            return redirect('/sogouviewurl');
        }else{
            echo '没有查到ID';
        }
    }
    //得到站点的代码，并验证
    protected function getCode(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $curl=curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL=>"https://zhanzhang.sogou.com/api/user/getWebList?status=",
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_ENCODING=>'',
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_FOLLOWLOCATION=>true,
            CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=>'GET',
            CURLOPT_TIMEOUT=>5,
            CURLOPT_HTTPHEADER=>$this->header));
        $response=curl_exec($curl);
        curl_close($curl);
        $data=json_decode($response,true);
        if($data['msg']!=='success'){
            return '接口数据没获取到';
        }
        $list=$data['data']['list'];
        foreach($this->domain as $d){
            foreach(array_keys($list) as $key){
                if($list[$key]['site_address']==='www.'.$d&&$list[$key]['status']==='notverify'){
                    $code=$list[$key]['verify_code'];
                    $handle=fopen(public_path('/sogousiteverification.txt'),"w+");
                    fwrite($handle,$code);
                    fclose($handle);
                    $data=[
                        'cur_type'=>'file',
                        'http'=>'http',
                        'id'=>$list[$key]['id'],
                        'site_address'=>$list[$key]['site_address'],
                        'verify_code'=>$code,
                        'verify_timestamp'=>time().mt_rand(100,999)
                    ];
                    $data=str_replace("\\\\","\\",json_encode($data,320));
                    $curl=curl_init();
                    curl_setopt_array($curl,array(
                        CURLOPT_URL=>"https://zhanzhang.sogou.com/api/user/verifySite",
                        CURLOPT_RETURNTRANSFER=>true,
                        CURLOPT_ENCODING=>'',
                        CURLOPT_MAXREDIRS=>10,
                        CURLOPT_FOLLOWLOCATION=>true,
                        CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST=>'POST',
                        CURLOPT_POSTFIELDS=>$data,
                        CURLOPT_TIMEOUT=>5,
                        CURLOPT_HTTPHEADER=>$this->header));
                    $response=curl_exec($curl);
                    curl_close($curl);
                    echo $response.$d."<br>";
                    flush();//刷新输出缓冲
                    break;
                }
            }
        }
    }
    //添加站点
    protected function addSite(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $data=[
                'http'=>'http',
                'site_address'=>$d
            ];
            $data=str_replace("\\\\","\\",json_encode($data,320));
            $curl=curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL=>'https://zhanzhang.sogou.com/api/website/addSite',
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>'',
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_FOLLOWLOCATION=>true,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>'POST',
                CURLOPT_POSTFIELDS=>$data,
                CURLOPT_TIMEOUT=>5,
                CURLOPT_CONNECTTIMEOUT=>3,
                CURLOPT_HTTPHEADER=>$this->header));
            $response=curl_exec($curl);
            curl_close($curl);
            if(!empty($response)){
                $data=json_decode($response,true);
                if(!empty($data['data'])){
                    $id=$data['data']['id'];
                    $code=$data['data']['verify_code'];
                    $path='cache/'.$d.'/Sogou/id.txt';
                    Storage::disk('local')->put($path,$id);
                    $handle=fopen(public_path('/sogousiteverification.txt'),"w+");
                    fwrite($handle,$code);
                    fclose($handle);
                    $data=[
                        'cur_type'=>'file',
                        'site_id'=>$id
                    ];
                    $data=str_replace("\\\\","\\",json_encode($data,320));
                    $curl=curl_init();
                    curl_setopt_array($curl,array(
                        CURLOPT_URL=>"https://zhanzhang.sogou.com/api/website/verifySite",
                        CURLOPT_RETURNTRANSFER=>true,
                        CURLOPT_ENCODING=>'',
                        CURLOPT_MAXREDIRS=>10,
                        CURLOPT_FOLLOWLOCATION=>true,
                        CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST=>'POST',
                        CURLOPT_POSTFIELDS=>$data,
                        CURLOPT_TIMEOUT=>5,
                        CURLOPT_CONNECTTIMEOUT=>3,
                        CURLOPT_HTTPHEADER=>$this->header));
                    curl_exec($curl);
                    curl_close($curl);
                }else{
                    echo '没成功';
                    var_dump($data);
                }
            }else{
                echo '没成功1';
            }
            echo $d."<br>";
            flush();//刷新输出缓冲
        }
    }
    //删除指定站点
    protected function delSite(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        $domainId=[];
        $num=1;
        foreach($this->domain as $d){
            $path='cache/'.$d.'/Sogou/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                array_push($domainId,$id[0]);
                echo $num++.'：'.$id[0]."<br>";
                flush();//刷新输出缓冲
            }
        }
        $data=[
            'ids'=>$domainId
        ];
        $data=str_replace("\\\\","\\",json_encode($data,320));
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => 'https://zhanzhang.sogou.com/api/website/delWebsite',
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
        echo $response;
    }
    //url得随机字符
    protected function urlformat($firstDomain){
        $port=$_SERVER['SERVER_PORT'];
        $randPort='';
        if((int)$port!==80){
            $randPort=':'.mt_rand(config('app.diy.port')[0],config('app.diy.port')[1]);
        }
        $address=config('app.diy.address');
        $urlformat=config('app.diy.urlformat')['Sogou'];
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
