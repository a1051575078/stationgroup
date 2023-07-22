<?php
return [
    'diy'=>[
        //所有有字就开启的，如果是0或者空都是认为关闭
        'annotation'=>'',//注释，人家可以查看源代码，通过这个手法找到你，不会对注释进行缓存在html后面，格式：<!--内容-->
        'apacheport'=>'xxx',//如果是apache的服务器，泛端口需要输入端口指向文件得内容，不像nginx直接listen就可以。复制宝塔内容apache配置。不要<VirtualHost>这个标签,需要她里面得内容
        'ascii'=>['，','：','！','的','。'],//只能是数组。凡是模板里面包含这些字符的，都会在指定字符前面添加一个ascii码。ascii码，因搜索引擎无法识别，所以会感觉你这个是高质量的东西。比如原文 你是我的儿子。  增加后：你是我ascii的儿子ascii。 如添加某些字符，比如小写句号. 会出错。可以试试。比如xxx.html  会变成xxxascii.html
        'associate'=>'',//是否内容得a标签点击后，下一个页面得title需要有关联，如果有关联就开启，没有关联就关闭，并且是属于随机文字，标题也不会刷新不变,缓存尽量配合自动爬取新闻标题使用，在txtinfo下面得news里面
        'automatic'=>'d',//开启自动采集标题句子
        'baidutoken'=>'',//百度API推送内页。一个网站正常来说推3000额度。不需要手动加站泛站。任意人访问自动推送当前域名1个。要保证这个token的确是这一批域名所属百度账号，只需要加站WWW，然后计划任务里面任务开启后，自动更新新闻、以及推送完。
        'body'=>'{article}{article}{article}{article}{article}{article}{pic}{article}{article}{article}',//目前只能写{article}和{pic}
        'cache'=>'1',//如果开启，就缓存到storage/app/public/cache里面
        'changetitle'=>'',//其他人模拟蜘蛛然后访问就修改标题,字符串里不要输空格。不然有问题，百度360来的话，有时候会收录修改后的标题
        'contentchange'=>24,//多少小时进行内容缓存更改。为空或者0则不刷新
        'del'=>'',//删除body所有得代码，查看元素没有，不缓存。防止别人看节点
        'delcache'=>'http://6/txtinfo/delcache.txt',//每日删除过期域名缓存
        'deluri'=>['/','?','.','*','~','@','!','#','$','%','^','&','(',')','\\','+','=','_','{','}',';','[',']'],//删除特殊字符,如果使用泛目录uri。www.xxx.com/a/?b.c*d 则返回并创建的缓存文件名是：abcd.html
        'description'=>'{NEWS}{5}',//自定义描述。{NEWS}就是随机循环一个新闻，{TITLE}就是跟标题一样的
        'directory'=>['https://baidu.com','https://sogou.com'],//输入目录的域名，则拼接sitemap不会出错
        'gettitle'=>['tip.com',8000],//生成的路径在根目录/public/ciyu.txt ，命令抓
        'hijack'=>'1',//是否开启寄生虫劫持
        'iframe'=>'',//一定要加http:// 否则无限跳。。。iframe跳转，当蜘蛛来爬的时候，或者有其他人用蜘蛛ua来研究你的界面的时候，就可以开启。直接在引流界面（跳转的jump.blade.php文件配置）盖住原页面
        'interlink'=>0,//互链  必须在link.txt配置里写好域名  都是有几率被互链得。所以注意每天域名到期时间，在进行删除。只能填写0-100  互链的几率， 为空也等于0
        'js'=>['var _hmt = _hmt || [];
            (function() {
              var hm = document.createElement("script");
              hm.src = "https://hm.baidu.com/hm.js?481d6087";
              var s = document.getElementsByTagName("script")[0];
              s.parentNode.insertBefore(hm, s);
            })();','window.location.href=""'],//JS的代码，比如统计代码跳转代码，会在resources/views/jump.blade.php执行
        'jtf'=>'',//简体转繁体是否开启
        'jump'=>'',//如果是内页，10秒后则跳转到当前得前缀主页。例如，如果访问www.baidu.com/1 。只要斜杠后面有东西，就会跳到www.baidu.com。为什么这样。因为别人也这样，也许会有奇效吧
        'keywords'=>3,//keywords里面添加几个词语描述，0就是和title一样
        'label'=>[],//小旋风用到得标签，传说这个叫干扰标签，不对此进行缓存。//['sup','time','tt','var','map','bdo','dfn','font','ins','small']
        'link'=>'http://6/txtinfo/links.txt',//互链的地址得地址
        'new'=>'1',//如果associate开启不缓存并且有关联，则不需要关联
        'news'=>['https://news.sina.com.cn/','https://www.qq.com/','https://www.ifeng.com/'],//爬新闻标题得链接,开启定时任务自动爬
        'noarchive'=>'有字就是开启',//是否禁止让访客点击快照并展示出来
        'port'=>[9000,10000],//端口号随机链接范围。不能为空。尽量往后填写，前面怕端口一样，出错。并且，需要在宝塔里面开启当前端口号这个范围内的端口，如果百度蜘蛛用网址:端口 访问的话。随机的链接就会应用这一波随机的端口
        'posttime'=>2600000,//模版发布的时间，系统当前时间 - 减少的时间
        'pinyin'=>'',//内容随机夹杂拼音比例的数量
        'rdf'=>288,//rdf资源格式，网址/xxx.rdf  预防傻子太多，例如：http://www.baidu.com/1.rdf  2、http://www.baidu.com/2.rdf 。数量由你决定，几个E都可以。只要你不怕生成慢
        'safety'=>'',//禁止查看源代码。如果是查看源代码,则跳转至某个链接。切记一定要加http://

        'spider'=>'Baiduspider|360Spider|Bytespider|Sogou|Yisou',//允许爬虫的缓存
        'template'=>[
            'Baiduspider'=>'百度',
            '360Spider'=>'360',
            'Bytespider'=>'头条',
            'Sogou'=>'搜狗',
            'Yisou'=>'神马',
            'bingbot'=>'必应',
            'Googlebot'=>'谷歌'
        ],//是否使用模板，不使用模板则是镜像
        'issingle'=>[
            'Baiduspider'=>'',
            '360Spider'=>'',
            'Bytespider'=>'',
            'Sogou'=>'',
            'Yisou'=>'',
            'bingbot'=>'',
            'Googlebot'=>''
        ],//是否开启单站镜像模式,单站模式开启后。优先级大于泛目录和泛镜像。单站>目录 镜像。只要开了单站模式，泛目录泛镜像的选项是否打开关闭都不会执行到。
        'navigation'=>[
            'Baiduspider'=>'/{change}kkbrichCOC4LVEi?',
            '360Spider'=>'/{change}kkbrichCOC4LVEi?',
            'Bytespider'=>'/{change}kkbrichCOC4LVEi?',
            'Sogou'=>'/{change}kkbrichCOC4LVEi?',
            'Yisou'=>'/{change}kkbrichCOC4LVEi?',
            'bingbot'=>'/{change}kkbrichCOC4LVEi?',
            'Googlebot'=>'/{change}kkbrichCOC4LVEi?'
        ],//导航栏的格式,只有{change}   HOST   Y 三个选项
        'urlformat'=>[
            'Baiduspider'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html'],
            //'Baiduspider'=>['//HOST/{time}/{2}.html'],
            '360Spider'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html'],
            'Bytespider'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html'],
            'Sogou'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html'],
            'Yisou'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html'],
            'bingbot'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html'],
            'Googlebot'=>['/{1}kkbrichCOC4LVEi?'.time().'{4}.html','/{1}kkbrichCOC4LVEi?{time}/{4}.html']
        ],//内容页的url随机格式。address就是随机一个地址拼音。Y是当前域名,HOST就是包含二级域名,数字是随机几位位数得英文+数字。time就是ymd格式
        'templatetitle'=>[
            'Baiduspider'=>['TITLE'],
            '360Spider'=>['TITLE'],
            'Bytespider'=>['TITLE'],
            'Sogou'=>['TITLE'],
            'Yisou'=>['TITLE'],
            'bingbot'=>['TITLE'],
            'Googlebot'=>['TITLE']
        ],//ADDRESS是地址,TITLE是标题，标题随机样式

        'sitemap'=>666,//sitemap生成的数量，在百度提交地址：  网址/任意字符.xml ，预防傻子太多，例如：http://www.baidu.com/1.xml  2、http://www.baidu.com/2.xml 。数量由你决定，几个E都可以。只要你不怕生成慢
        'unicode'=>'1',//开启后只有TDK全部转码，因为搜索引擎也许会根据字来进行收录。反正人家都这么搞
        'webs'=>'http://5/txtinfo/webs.txt',//镜像对象得网址
        'sogou'=>['193.164.223','154.213.37','123.125.186','39.130.178','101.227.139','117.132.183','220.249.46','183.36.114','36.110.147','183.36.115','123.126.68','58.250.125','111.202.101','106.38.241','49.7.20','49.7.21','123.183.224','111.202.100'],//Sogou蜘蛛的ip段，有些IPua头没有携带
        '360'=>['101.199.125','36.99.136','111.7.100','36.110.233','36.110.211','27.115.124','171.13.14','180.153.232','180.153.234','180.153.236','180.163.220','42.236.101','42.236.102','42.236.103','42.236.10','42.236.12','42.236.13','42.236.14','42.236.15','42.236.16','42.236.17','42.236.46','42.236.48','42.236.49','42.236.50','42.236.51','42.236.52','42.236.53','42.236.54','42.236.55','42.236.99'],//360蜘蛛的ip段，有些IPua头没有携带
        'baidu'=>['220.181.77','114.215.198','180.76.170','220.181.108','116.179.32','111.206.221','36.110.199','111.206.36'],//百度蜘蛛的ip段，ua头没有携带特定值就访问
        'shenma'=>['140.205.80','140.205.108'],//神马蜘蛛的ip段，ua头没有携带特定值就访问
        'address'=>[
            '北京','天津','上海','重庆',
            '乌鲁木齐','克拉玛依','石河子','阿拉尔市','图木舒克','五家渠','哈密','吐鲁番','阿克苏','喀什','和田','伊宁','塔城','阿勒泰','奎屯','博乐','阜康','昌吉','库尔勒','阿图什','乌苏',
            '拉萨','日喀则',
            '银川','石嘴山','吴忠','固原','中卫','青铜峡市','灵武市',
            '呼和浩特','包头','乌海','赤峰','通辽','鄂尔多斯','呼伦贝尔','巴彦淖尔','乌兰察布','霍林郭勒市','满洲里市','牙克石市','扎兰屯市','根河市','额尔古纳市','丰镇市','锡林浩特市','二连浩特市','乌兰浩特市','阿尔山市',
            '南宁','柳州','桂林','梧州','北海','崇左','来宾','贺州','玉林','百色','河池','钦州','防城港','贵港','岑溪','凭祥','合山','北流','宜州','东兴','桂平',
            '哈尔滨','大庆','齐齐哈尔','佳木斯','鸡西','鹤岗','双鸭山','牡丹江','伊春','七台河','黑河','绥化','五常','双城','尚志','纳河','虎林','密山','铁力','同江','富锦','绥芬河','海林','宁安','穆林','北安','五大连池','肇东','海伦','安达',
            '长春','吉林','四平','辽源','通化','白山','松原','白城','九台市','榆树市','德惠市','舒兰市','桦甸市','蛟河市','磐石市','公主岭市','双辽市','梅河口市','集安市','临江市','大安市','洮南市','延吉市','图们市','敦化市','龙井市','珲春市','和龙市',
            '沈阳','大连','鞍山','抚顺','本溪','丹东','锦州','营口','阜新','辽阳','盘锦','铁岭','朝阳','葫芦岛','新民','瓦房店','普兰','庄河','海城','东港','凤城','凌海','北镇','大石桥','盖州','灯塔','调兵山','开原','凌源','北票','兴城',
            '石家庄','唐山','邯郸','秦皇岛','保定','张家口','承德','廊坊','沧州','衡水','邢台','辛集市','藁城市','晋州市','新乐市','鹿泉市','遵化市','迁安市','武安市','南宫市','沙河市','涿州市','定州市','安国市','高碑店市','泊头市','任丘市','黄骅市','河间市','霸州市','三河市','冀州市','深州市',
            '济南','青岛','淄博','枣庄','东营','烟台','潍坊','济宁','泰安','威海','日照','莱芜','临沂','德州','聊城','菏泽','滨州',
            '章丘','胶南','胶州','平度','莱西','即墨','滕州','龙口','莱阳','莱州','招远','蓬莱','栖霞','海阳','青州','诸城','安丘','高密','昌邑','兖州','曲阜','邹城','乳山','文登','荣成','乐陵','临清','禹城',
            '南京','镇江','常州','无锡','苏州','徐州','连云港','淮安','盐城','扬州','泰州','南通','宿迁','江阴市','宜兴市','邳州市','新沂市','金坛市','溧阳市','常熟市','张家港市','太仓市','昆山市','吴江市','如皋市','通州市','海门市','启东市','东台市','大丰市','高邮市','江都市','仪征市','丹阳市','扬中市','句容市','泰兴市','姜堰市','靖江市','兴化市',
            '合肥','蚌埠','芜湖','淮南','亳州','阜阳','淮北','宿州','滁州','安庆','巢湖','马鞍山','宣城','黄山','池州','铜陵','界首','天长','明光','桐城','宁国',
            '杭州','嘉兴','湖州','宁波','金华','温州','丽水','绍兴','衢州','舟山','台州','建德市','富阳市','临安市','余姚市','慈溪市','奉化市','瑞安市','乐清市','海宁市','平湖市','桐乡市','诸暨市','上虞市','嵊州市','兰溪市','义乌市','东阳市','永康市','江山市','临海市','温岭市','龙泉市',
            '福州','厦门','泉州','三明','南平','漳州','莆田','宁德','龙岩','福清市','长乐市','永安市','石狮市','晋江市','南安市','龙海市','邵武市','武夷山','建瓯市','建阳市','漳平市','福安市','福鼎市',
            '广州','深圳','汕头','惠州','珠海','揭阳','佛山','河源','阳江','茂名','湛江','梅州','肇庆','韶关','潮州','东莞','中山','清远','江门','汕尾','云浮','增城市','从化市','乐昌市','南雄市','台山市','开平市','鹤山市','恩平市','廉江市','雷州市 ','吴川市','高州市','化州市','高要市','四会市','兴宁市','陆丰市','阳春市','英德市','连州市','普宁市','罗定市','信宜市',
            '海口','三亚','琼海','文昌','万宁','五指山','儋州','东方',
            '昆明','曲靖','玉溪','保山','昭通','丽江','普洱','临沧','安宁市','宣威市','个旧市','开远市','景洪市','楚雄市','大理市','潞西市','瑞丽市',
            '贵阳','六盘水','遵义','安顺','清镇市','赤水市','仁怀市','铜仁市','毕节市','兴义市','凯里市','都匀市','福泉市',
            '成都','绵阳','德阳','广元','自贡','攀枝花','乐山','南充','内江','遂宁','广安','泸州','达州','眉山','宜宾','雅安','资阳','都江堰市','彭州市','邛崃市','崇州市','广汉市','什邡市','绵竹市','江油市','峨眉山市','阆中市','华蓥市','万源市','简阳市','西昌市',
            '长沙','株洲','湘潭','衡阳','岳阳','郴州','永州','邵阳','怀化','常德','益阳','张家界','娄底','浏阳市','醴陵市','湘乡市','韶山市','耒阳市','常宁市','武冈市','临湘市','汨罗市','津市市','沅江市','资兴市','洪江市','冷水江市','涟源市','吉首市',
            '武汉','襄樊','宜昌','黄石','鄂州','随州','荆州','荆门','十堰','孝感','黄冈','咸宁','大冶市','丹江口市','洪湖市','石首市','松滋市','宜都市','当阳市','枝江市','老河口市','枣阳市','宜城市','钟祥市','应城市','安陆市','汉川市','麻城市','武穴市','赤壁市','广水市','仙桃市','天门市','潜江市','恩施市','利川市',
            '郑州','洛阳','开封','漯河','安阳','新乡','周口','三门峡','焦作','平顶山','信阳','南阳','鹤壁','濮阳','许昌','商丘','驻马店','巩义市','新郑市','新密市','登封市','荥阳市','偃师市','汝州市','舞钢市','林州市','卫辉市','辉县市','沁阳市','孟州市','禹州市','长葛市','义马市','灵宝市','邓州市','永城市','项城市','济源市',
            '太原','大同','忻州','阳泉','长治','晋城','朔州','晋中','运城','临汾','吕梁','古交','潞城','高平','介休','永济','河津','原平','侯马','霍州','孝义','汾阳',
            '西安','咸阳','铜川','延安','宝鸡','渭南','汉中','安康','商洛','榆林','兴平市','韩城市','华阴市',
            '兰州','天水','平凉','酒泉','嘉峪关','金昌','白银','武威','张掖','庆阳','定西','陇南','玉门市','敦煌市','临夏市','合作市',
            '西宁','格尔木','德令哈',
            '南昌','九江','赣州','吉安','鹰潭','上饶','萍乡','景德镇','新余','宜春','抚州','乐平市','瑞昌市','贵溪市','瑞金市','南康市','井冈山市','丰城市','樟树市','高安市','德兴市',
            '台北','台中','基隆','高雄','台南','新竹','嘉义','板桥市','宜兰市','竹北市','桃园市','苗栗市','丰原市','彰化市','南投市','太保市','斗六市','新营市','凤山市','屏东市','台东市','花莲市','马公市',
            '香港','澳门'],
        'black'=>[
            'douyu.com',
            'jd.com',
            'youdao.com',
            'apple.com',
            'dongqiudi.com',
            'huawei.com',
            'hupu.com',
            '360doc.com',
            'qtx.com',
            'newskj.com',
            'zhcw.com',
            'sina.com.cn',
            '55125.cn',
            '163.com',
            'cz89.com',
            'southmoney.com',
            '78500.cn',
            'ssqzj.com',
            '360doc.cn',
            'cjcp.com.cn',
            '17500.cn',
            '8200.cn',
            'ydniu.com',
            '9game.cn',
            'jb51.net',
            'douban.com',
            '360.cn',
            '310win.com',
            'jiangduoduo.com',
            'weibo.cn',
            'weibo.com',
            'csdn.net',
            'sogou.com',
            'people.com.cn',
            'chinadaily.com.cn',
            'youth.cn',
            'baidu.com',
            'chinanews.com',
            'sohu.com',
            'china.com.cn',
            'eastday.com',
            'xinhuanet.com',
            'haiwainet.cn',
            'cctv.com',
            'npc.gov.cn',
            'qhnews.com',
            'stdaily.com',
            'ndwww.cn',
            'wenming.cn',
            'iqilu.com',
            'cri.cn',
            'tianya.cn',
            'qq.com',
            'zhihu.com',
            'pptv.com',
            '110.com',
            'okooo.com',
            'uzzf.com',
            'paopaoche.net',
            'rsdown.cn',
            'cwl.gov.cn',
            '500.com',
            '64365.com',
            '66law.cn',
            'findlaw.cn',
            '1688.com',
            'lottery.gov.cn',
            '58pic.com',
            'sina.cn',
            'tencent.com',
            '962.ne',
            'taobao.com',
            'qqtn.com',
            'lanrentuku.com',
            'chinaz.com',
            'tgbus.com',
            'yxdown.com',
            'doyo.cn',
            'cnhubei.com',
            'pc6.com',
            '99danji.com',
            'cr173.com',
            'downcc.com',
            'ifeng.com',
            'southcn.com',
            'aliyun.com',
            'smzy.com',
            'pchome.net',
            'cncrk.com',
            'sporttery.cn',
            'zgzcw.com',
            'zjlottery.com',
            'mop.com',
            'bilibili.com',
            'sogoucdn.com',
            'pconline.com.cn',
            'downza.cn',
            'youku.com',
            'iqiyi.com',
            '911cha.com',
            'ddooo.com',
            'crsky.com',
            'mafengwo.cn',
            'aicai.com',
            'autohome.com.cn',
            'cqcp.net'
        ],//违禁词得网址
        'domain'=>[
            'com.cn',
            'net.cn',
            'org.cn',
            'gov.cn',
            'com.af',
            'ae.org',
            'net.af',
            'org.af',
            'africa.com',
            'co.ag',
            'com.ag',
            'net.ag',
            'nom.ag',
            'org.ag',
            'com.ai',
            'com.gi',
            'com.al',
            'net.al',
            'org.al',
            'co.am',
            'com.am',
            'net.am',
            'org.am',
            'radio.am',
            'co.ao',
            'radio.fm',
            'gb.net',
            'net.ge',
            'com.ge',
            'co.gg',
            'org.ge',
            'org.gg',
            'net.gg',
            'net.ki',
            'com.ar',
            'org.ar',
            'co.at',
            'or.at',
            'com.au',
            'net.au',
            'co.az',
            'net.az',
            'org.az',
            'biz.az',
            'info.az',
            'int.az',
            'pp.az',
            'pro.az',
            'co.ba',
            'com.band',
            'com.bb',
            'com.bh',
            'co.bi',
            'com.bi',
            'or.bi',
            'org.bi',
            'com.bo',
            'net.bo',
            'org.bo',
            'tv.bo',
            'com.br',
            'net.br',
            'br.com',
            'com.bs',
            'com.by',
            'net.by',
            'minsk.by',
            'co.bz',
            'com.bz',
            'net.bz',
            'org.bz',
            'za.bz',
            'co.ci',
            'com.ci',
            'net.ci',
            'or.ci',
            'org.ci',
            'co.ck',
            'co.cm',
            'com.cm',
            'net.cm',
            'cn.com',
            'com.co',
            'net.co',
            'nom.co',
            'co.com',
            'com.cu',
            'co.de',
            'com.de',
            'de.com',
            'co.dm',
            'com.do',
            'com.ec',
            'net.ec',
            'fin.ec',
            'info.ec',
            'med.ec',
            'pro.ec',
            'co.ee',
            'com.ee',
            'com.es',
            'nom.es',
            'org.es',
            'com.et',
            'eu.com',
            'com.fj',
            'co.gl',
            'com.gl',
            'net.gl',
            'org.gl',
            'com.gp',
            'com.gr',
            'net.gr',
            'org.gr',
            'gr.com',
            'com.gt',
            'co.gy',
            'com.gy',
            'net.gy',
            'com.hk',
            'com.hn',
            'net.hn',
            'org.hn',
            'com.hr',
            'com.ht',
            'net.ht',
            'org.ht',
            'co.hu',
            'org.hu',
            'hu.net',
            'co.id',
            'biz.id',
            'my.id',
            'web.id',
            'co.il',
            'org.il',
            'co.im',
            'com.im',
            'net.im',
            'org.im',
            'co.in',
            'net.in',
            'org.in',
            'firm.in',
            'com.lk',
            'org.lk',
            'co.ls',
            'com.lv',
            'net.lv',
            'org.lv',
            'com.ly',
            'net.ly',
            'org.ly',
            'co.ma',
            'net.ma',
            'org.ma',
            'mex.com',
            'com.md',
            'org.md',
            'gen.in',
            'ind.in',
            'in.net',
            'co.je',
            'net.je',
            'org.je',
            'com.jm',
            'com.jo',
            'ne.jp',
            'gr.jp',
            'jpn.com',
            'jp.net',
            'co.ke',
            'com.kg',
            'net.kg',
            'org.kg',
            'com.ki',
            'co.mg',
            'com.mg',
            'net.mg',
            'org.mg',
            'or.mg',
            'com.mk',
            'net.mk',
            'org.mk',
            'co.ms',
            'com.ms',
            'org.ms',
            'com.mt',
            'net.mt',
            'co.mu',
            'com.mu',
            'net.mu',
            'or.mu',
            'org.mu',
            'ac.mu',
            'co.mw',
            'com.mw',
            'com.mx',
            'org.mx',
            'com.my',
            'net.my',
            'co.mz',
            'co.na',
            'com.na',
            'net.na',
            'org.na',
            'com.sc',
            'net.sc',
            'org.sc',
            'com.sd',
            'net.sd',
            'org.sd',
            'com.se',
            'se.net',
            'com.sg',
            'com.sl',
            'net.sl',
            'org.sl',
            'com.sn',
            'org.sn',
            'com.so',
            'org.ki',
            'biz.ki',
            'info.ki',
            'com.kn',
            'edu.kn',
            'co.kr',
            'ne.kr',
            'or.kr',
            'pe.kr',
            're.kr',
            'seoul.kr',
            'com.kw',
            'com.kz',
            'com.lc',
            'net.lc',
            'org.lc',
            'com.lb',
            'co.lc',
            'com.ro',
            'nom.ro',
            'org.ro',
            'info.ro',
            'co.rs',
            'org.rs',
            'com.ru',
            'net.ru',
            'org.ru',
            'pp.ru',
            'ru.com',
            'net.tt',
            'co.rw',
            'net.rw',
            'org.rw',
            'com.sa',
            'sa.com',
            'com.sb',
            'net.sb',
            'org.sb',
            'web.ve',
            'co.vi',
            'com.vi',
            'com.vn',
            'biz.vn',
            'info.vn',
            'com.vu',
            'net.vu',
            'org.vu',
            'edu.vu',
            'com.nf',
            'net.nf',
            'org.nf',
            'com.ng',
            'net.ng',
            'org.ng',
            'com.ni',
            'net.ni',
            'org.ni',
            'co.nl',
            'com.nl',
            'net.nl',
            'co.no',
            'com.nr',
            'co.nz',
            'net.nz',
            'org.nz',
            'kiwi.nz',
            'com.om',
            'org.tt',
            'biz.tt',
            'pro.tt',
            'info.tt',
            'name.tt',
            'com.tw',
            'idv.tw',
            'game.tw',
            'club.tw',
            'ebiz.tw',
            'co.ua',
            'com.ua',
            'net.ua',
            'org.ua',
            'biz.ua',
            'co.ug',
            'com.ug',
            'org.ug',
            'co.uk',
            'me.uk',
            'org.uk',
            'uk.com',
            'uk.net',
            'us.com',
            'us.org',
            'com.vc',
            'net.vc',
            'org.vc',
            'co.ve',
            'com.ve',
            'net.ve',
            'org.ve',
            'info.ve',
            'co.za',
            'org.za',
            'za.com',
            'co.zm',
            'co.zw',
            'com.pa',
            'com.pe',
            'net.pe',
            'org.pe',
            'nom.pe',
            'com.ph',
            'net.ph',
            'org.ph',
            'com.pk',
            'net.pk',
            'org.pk',
            'biz.pk',
            'web.pk',
            'com.pl',
            'net.pl',
            'org.pl',
            'biz.pl',
            'info.pl',
            'co.pn',
            'net.pn',
            'org.pn',
            'com.pr',
            'net.pr',
            'org.pr',
            'pro.pr',
            'biz.pr',
            'info.pr',
            'name.pr',
            'isla.pr',
            'com.ps',
            'net.ps',
            'org.ps',
            'co.pt',
            'com.pt',
            'org.pt',
            'com.py',
            'net.so',
            'org.so',
            'com.sv',
            'co.tj',
            'com.tj',
            'net.tj',
            'ac.tj',
            'aero.tj',
            'biz.tj',
            'coop.tj',
            'dyn.tj',
            'info.tj',
            'int.tj',
            'my.tj',
            'name.tj',
            'per.tj',
            'pro.tj',
            'web.tj',
            'com.tl',
            'net.tl',
            'org.tl',
            'co.tt',
            'he.cn',
            'jl.cn',
            'sh.cn',
            'ac.cn',
            'bj.cn',
            'tj.cn',
            'com.tt',
            'com.az',
            'name.az',
            'cq.cn',
            'sx.cn',
            'nm.cn',
            'ln.cn',
            'hl.cn',
            'js.cn',
            'zj.cn',
            'ah.cn',
            'fj.cn',
            'jx.cn',
            'sd.cn',
            'ha.cn',
            'hb.cn',
            'hn.cn',
            'gd.cn',
            'gx.cn',
            'hi.cn',
            'sc.cn',
            'gz.cn',
            'yn.cn',
            'xz.cn',
            'sn.cn',
            'gs.cn',
            'qh.cn',
            'nx.cn',
            'xj.cn',
            'tw.cn',
            'hk.cn',
            'mo.cn'],//域名后缀有可能出现这样的情况
    ],
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */
    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Shanghai',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
