<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmToolController extends Controller{
    private $header;
    private $domain;
    private $csrf;
    public function __construct(){
        $this->csrf='4a51eb2e3e38b3fa715e4654d232bf3a';
        $universal=file(Storage::disk('local')->path('txtinfo/universal.txt'));
        $this->domain=str_replace("\r",'',str_replace("\n",'',$universal));
        $this->header=[
            'accept: application/json, text/javascript, */*; q=0.01',
            'accept-encoding: gzip, deflate, br',
            'accept-language: zh-CN,zh;q=0.9',
            'content-type: application/x-www-form-urlencoded; charset=UTF-8',
            'cookie: sm_diu=339f004fde57807b947def328ddc65bf%7C%7C11eef1ee707c658e4f%7C1634563231; cna=WlJOGbMV1kICAXdfCiXxARyO; sm_uuid=963b0601c22b1d04ebe4144d4804eaeb%7C%7C%7C1634563788; UM_distinctid=17c939810c8371-026075f0d153fa-b7a1438-144000-17c939810c977b; isg=BNbWd959q9X-SZ9oBDBu7fMbJ4zYdxqx4QCjIUA_w7lWA3Sdowf9wZ6yn5nvqxLJ; l=eBLT-lQggHc9Oqi5BOfZFurza779sIRVguPzaNbMiOCPOzCk5qThW6U-UHYDCnGRnsKHz38YsXPuBlLLwyUIQxv9-eZvxtVqnddC.; tfstk=c8JcBbqaGI5XJ2hPpx6XV43hQ8AGZQPFlMsHUpmILBoACKJPiKNzTth8HwooE51..; 54b2cfa0b0d1f726807932780cb917d4=0d576ba6ccef7b455cee2b034fd6cad65f571133a%3A4%3A%7Bi%3A0%3Bs%3A6%3A%22517197%22%3Bi%3A1%3Bs%3A28%3A%22imakemoney88888888%40gmail.com%22%3Bi%3A2%3Bi%3A604800%3Bi%3A3%3Ba%3A0%3A%7B%7D%7D; zhanzhang_access_new=b551a780d91a00d5f35102dd3aa4badd; zhanzhang_access=o28td6ueugr054170nrc12h996; CNZZDATA1254615503=1833234474-1634559473-https%253A%252F%252Fwww.google.com%252F%7C1635707729',
            'origin: https://zhanzhang.sm.cn',
            'referer: https://zhanzhang.sm.cn/open/detialPage'
        ];
    }
    //添加sitemap
    protected function addSitemap(){
        header('X-Accel-Buffering: no'); // nginx要加这一行
        set_time_limit(10);
        ob_end_clean();//在循环输出前，要关闭输出缓冲区
        echo str_pad('',1024);
        foreach($this->domain as $d){
            $path='cache/'.$d.'/Yisou/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                $curl=curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL=>'https://zhanzhang.sm.cn/open/addSitemapUrl',
                    CURLOPT_RETURNTRANSFER=>true,
                    CURLOPT_ENCODING=>'',
                    CURLOPT_MAXREDIRS=>10,
                    CURLOPT_FOLLOWLOCATION=>true,
                    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST=>'POST',
                    CURLOPT_POSTFIELDS=>"domain_id=$id[0]&type=0&url=http%3A%2F%2Fwww.$d%2Fsitemap.xml",
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
            $path='cache/'.$d.'/Yisou/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                $curl=curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL=>"https://zhanzhang.sm.cn/open/webcheck/web/$id[0]",
                    CURLOPT_RETURNTRANSFER=>true,
                    CURLOPT_ENCODING=>'',
                    CURLOPT_MAXREDIRS=>10,
                    CURLOPT_FOLLOWLOCATION=>true,
                    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST=>'GET',
                    CURLOPT_TIMEOUT=>0,
                    CURLOPT_HTTPHEADER=>$this->header));
                $response=curl_exec($curl);
                curl_close($curl);
                preg_match('/content=\"(\w+)_(\d+)\"/',$response,$match);
                if(!empty($match[1])){
                    $num=0;
                    $handle=fopen(public_path('/shenma-site-verification.txt'),"w+");
                    fwrite($handle,'shenma-site-verification:'.$match[1].'_'.time());
                    fclose($handle);
                    while(true){
                        $curl=curl_init();
                        curl_setopt_array($curl,array(
                            CURLOPT_URL=>"https://zhanzhang.sm.cn/open/domainCheck",
                            CURLOPT_RETURNTRANSFER=>true,
                            CURLOPT_ENCODING=>'',
                            CURLOPT_MAXREDIRS=>10,
                            CURLOPT_FOLLOWLOCATION=>true,
                            CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST=>'POST',
                            CURLOPT_POSTFIELDS=>"domain_id=$id[0]&type=2",
                            CURLOPT_TIMEOUT=>0,
                            CURLOPT_HTTPHEADER=>$this->header));
                        $response=curl_exec($curl);
                        curl_close($curl);
                        echo $response.$d."<br>";
                        flush();//刷新输出缓冲
                        $num++;
                        if($num>9||preg_match("/code\":0/",$response)){
                            break;
                        }
                    }
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
            $rand=mt_rand(1,26);
            $curl=curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL=>'https://zhanzhang.sm.cn/open/addDomain',
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>'',
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_FOLLOWLOCATION=>true,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>'POST',
                CURLOPT_POSTFIELDS=>"domain=www.$d&type=$rand&is_single_url=1&csrf_token=$this->csrf",
                CURLOPT_TIMEOUT=>0,
                CURLOPT_HTTPHEADER=>$this->header));
            $response=curl_exec($curl);
            curl_close($curl);
            echo $response.$d."<br>";
            if($response){
                preg_match('/"code":0,"msg":"(\d+)"/',$response,$match);
                if(!empty($match[1])){
                    $path='cache/'.$d.'/Yisou/id.txt';
                    Storage::disk('local')->put($path,$match[1]);
                }
            }
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
            $path='cache/'.$d.'/Yisou/id.txt';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                $id=file(storage_path('app/public/'.$path));
                $curl = curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL => 'https://zhanzhang.sm.cn/open/deleteDomain',
                    CURLOPT_RETURNTRANSFER=>true,
                    CURLOPT_ENCODING=>'',
                    CURLOPT_MAXREDIRS=>10,
                    CURLOPT_FOLLOWLOCATION=>true,
                    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST=>'POST',
                    CURLOPT_POSTFIELDS => "id=$id[0]&csrf_token=$this->csrf",
                    CURLOPT_TIMEOUT=>0,
                    CURLOPT_HTTPHEADER =>$this->header));
                $response = curl_exec($curl);
                curl_close($curl);
                echo $response.$d."<br>";
                flush();//刷新输出缓冲
            }
        }
    }
}
