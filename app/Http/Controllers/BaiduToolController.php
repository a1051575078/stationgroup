<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaiduToolController extends Controller{
    private $header;
    private $ip;
    //获取百度爆出来的词
    public function getCi(Request $request){
        $ciyu=$request['ciyu'];
        $ciyu=explode("\r\n",$ciyu);
        $this->ip=$this->getIp();
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
            $array=[];
            $word=urlencode($cy);
            echo $cy."<br>";
            flush();//刷新输出缓冲
            $num=0;
            //获取百度下拉词
            while(true){
                $xiala=$this->xiala($word);
                if(!empty($xiala['g'])){
                    break;
                }else{
                    $num++;
                    if($num>2){
                        break;
                    }
                }
            }
            if($num<2){
                foreach($xiala['g'] as $x){
                    array_push($array,$x['q']);
                }
            }
            $q=0;
            //获取百度qid
            while(true){
                $source=$this->getQid($word);
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
                continue;
            }
            $all=0;
            //获取百度所有词
            while(true){
                $source=$this->getAll($word,$time,$qid);
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
                continue;
            }
            $c=$source['rs'];
            if(!empty($c['rcmd']['list'])){
                foreach($c['rcmd']['list'] as $list){
                    foreach($list['up'] as $l){
                        array_push($array,$l);
                    }
                    foreach($list['down'] as $l){
                        array_push($array,$l);
                    }
                }
            }
            if(!empty($c['ars'])){
                foreach($c['ars']['rs'] as $rs){
                    array_push($array,$rs['text']);
                }
                foreach($c['ars']['rgrs'] as $rs){
                    array_push($array,$rs['text']);
                }
            }
            foreach(array_unique($array) as $v){
                echo $v."<br>";
                flush();//刷新输出缓冲
            }
        }
    }
    //得到IP
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
    //改变header头的IP
    protected function changeCookie($cookie){
        $this->header=[
            'Host:m.baidu.com',
            'Cookie:'.$cookie[mt_rand(0,count($cookie)-1)],
        ];
    }
    //获取百度下拉词接口
    protected function xiala($word){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'https://m.baidu.com/sugrec?json=1&prod=wise&wd='.$word);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,2);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch,CURLOPT_HTTPHEADER, $this->header);
        $source=curl_exec($ch);
        curl_close($ch);
        return json_decode($source,true);
    }
    //获取百度QID接口
    protected function getQid($word){
        $url='https://m.baidu.com/s?word='.$word.'&sa=tb&ts=6790623&t_kt=0&ie=utf-8&rsv_t=51430XOeh59PCYKPcdur3wVdQWOJqoBb%252BsdDegii5HGaMQNG9JD6&rsv_pq=9163822268405790053&ss=110&sugid=6440445563492639290&rqlang=zh&rsv_sug4=915&inputT=299&oq='.$word;
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,$url);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_TIMEOUT,2);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch,CURLOPT_HTTPHEADER,$this->header);
        curl_setopt($ch,CURLOPT_HEADER,1);
        curl_setopt($ch,CURLOPT_INTERFACE,$this->ip[mt_rand(0,count($this->ip)-1)]);
        $source=curl_exec($ch);
        curl_close($ch);
        return $source;
    }
    //获取所有词
    protected function getAll($word,$time,$qid){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,'https://m.baidu.com/rec?platform=wise&ms=1&lsAble=1&rset=rcmd&word='.$word.'&qid='.$qid.'&rq='.$word.'&from=0&baiduid=C8FEAEDA60815D28F7EF94F9720DF0AC:FG=1&tn=&clientWidth=719&t='.$time.'&r=9003');//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,2);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch,CURLOPT_HTTPHEADER, $this->header);
        $source=curl_exec($ch);
        curl_close($ch);
        return json_decode($source,true);
    }
}
