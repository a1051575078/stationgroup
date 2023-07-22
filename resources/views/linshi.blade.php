@php($data=app('App\Http\Controllers\CoreController'))
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gbk" />
    <title>{!!$title!!}</title>
    <link href="https://www.17jita.com{{$uri}}" rel="canonical" />
    <meta name="keywords" content="{!!$title!!}" />
    <meta name="description" content="{!!$title!!}" />
    <meta name="generator" content="17jita.com v7.0" />
    <meta name="author" content="long" />
    <meta name="copyright" content="2010-2018 www.17jita.com" />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <meta name="applicable-device"content="pc">
    <base href="https://www.17jita.com/" />
    <link rel="stylesheet" type="text/css" href="data/cache/style_2_common.css?BO3" />
    <link rel="stylesheet" type="text/css" href="data/cache/style_2_forum_viewthread.css?BO3" />
    <script type="text/javascript">var STYLEID = '2', STATICURL = 'static/', IMGDIR = 'static/image/common', VERHASH = 'BO3', charset = 'gbk', discuz_uid = '0', cookiepre = 'RgVx_2132_', cookiedomain = '', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread|viewvote|tradeorder|activity|debate', creditnotice = '1|威望|,2|金币|,3|贡献|', defaultstyle = '', REPORTURL = 'aHR0cDovL3d3dy4xN2ppdGEuY29tL3dlbmRhLzEzOTI1Lmh0bWw=', SITEURL = 'https://www.17jita.com/', JSPATH = 'data/cache/', CSSPATH = 'data/cache/style_', DYNAMICURL = '';</script>
    <script src="data/cache/common.js?BO3" type="text/javascript"></script>
    <script src="data/cache/forum.js?BO3" type="text/javascript"></script>
</head>
<body id="nv_forum" class="pg_viewthread" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="toptb" class="cl">
    <div class="wp">
        <div class="z">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank"  style="color: red">{{$info['title']}}</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank"  style="color: green">{{$info['title']}}</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}"  style="color: blue">{{$info['title']}}</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank" >{{$info['title']}}</a>
        </div>
        <div class="y">
            <a id="switchblind" href="javascript:;" onClick="toggleBlind(this)" title="开启辅助访问" class="switchblind">开启辅助访问</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}"  style="color: red">{{$info['title']}}</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}"  style="color: blue">{{$info['title']}}</a>
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" title="{{$info['title']}}"  style="color: blue">{{$info['title']}}</a>
        </div>
    </div>
</div>
<div id="qmenu_menu" class="p_pop blk" style="display: none;">
    <div class="ptm pbw hm">
        请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？
        @php($info=$data->navigation($firstDomain,$pinyin))
        <a href="{{$info['url']}}" class="xi2 xw1">{{$info['title']}}</a>
    </div>
    <div id="fjump_menu" class="btda"></div></div><div id="hd">
    <div class="wp">
        <div class="hdc pbm cl">
            <h2>@php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}">
                    <img src="static/image/common/logo.png" alt="{{$info['title']}}" border="0" />
                </a>
            </h2>
            <script src="data/cache/logging.js?BO3" type="text/javascript"></script>@php($info=$data->navigation($firstDomain,$pinyin))
            <form method="post" autocomplete="off" id="lsform" action="{{$info['url']}}" onsubmit="return lsSubmit();">
                <div class="fastlg cl">
                    <span id="return_ls" style="display:none"></span>
                    <div class="y pns">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td><label for="ls_username">帐号</label></td>
                                <td><input type="text" name="username" id="ls_username" class="px vm xg1"  value="UID/用户名/Email" onfocus="if(this.value == 'UID/用户名/Email'){this.value = '';this.className = 'px vm';}" onblur="if(this.value == ''){this.value = 'UID/用户名/Email';this.className = 'px vm xg1';}" tabindex="901" /></td>
                                <td class="fastlg_l">
                                    <label for="ls_cookietime">
                                        <input type="checkbox" name="cookietime" id="ls_cookietime" class="pc" value="2592000" tabindex="903" />自动登录</label></td>@php($info=$data->navigation($firstDomain,$pinyin))
                                <td>&nbsp;<a href="javascript:;" onclick="showWindow('login', '{{$info['url']}}')">找回密码</a></td>
                            </tr>
                            <tr>
                                <td><label for="ls_password">密码</label></td>
                                <td><input type="password" name="password" id="ls_password" class="px vm" autocomplete="off" tabindex="902" /></td>
                                <td class="fastlg_l"><button type="submit" class="pn vm" tabindex="904" style="width: 75px;"><em>登录</em></button></td>@php($info=$data->navigation($firstDomain,$pinyin))
                                <td>&nbsp;<a href="{{$info['url']}}" class="xi2 xw1">{{$info['title']}}</a></td>
                            </tr>
                        </table>
                        <input type="hidden" name="quickforward" value="yes" />
                        <input type="hidden" name="handlekey" value="ls" />
                    </div>

                    <div class="fastlg_fm y" style="margin-right: 10px; padding-right: 10px">@php($info=$data->navigation($firstDomain,$pinyin))
                        <p><a href="{{$info['url']}}"><img src="static/image/common/qq_login.gif" class="vm" alt="{{$info['title']}}" /></a></p>
                        <p class="hm xg1" style="padding-top: 2px;">只需一步，快速开始</p>
                    </div>
                </div>
            </form>
        </div>
        <div id="nv">
            <ul>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_Nbea6" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'hover','duration':2})"><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_forum" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_N33d9" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_Nf0cd" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'hover','duration':2})"><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_N2366" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_Nc3a4" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_N743d" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}" target="_blank"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_N72d0" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}" target="_blank"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_Nc4f9" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_N8643" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
                @php($info=$data->navigation($firstDomain,$pinyin))
                <li id="mn_home" ><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}"  >{{$info['title']}}<span>{{$info['title']}}</span></a></li>
            </ul>
        </div>
        <ul class="p_pop h_pop" id="mn_Nbea6_menu" style="display: none">
            @php($info=$data->content($firstDomain,$pinyin))
            <li><a href="{{$info['url']}}" hidefocus="true"  style="color: red">{{$info['title']}}</a></li>
        </ul>
        <ul class="p_pop h_pop" id="mn_Nf0cd_menu" style="display: none">
            @for($i=0;$i<7;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <li><a href="{{$info['url']}}" hidefocus="true" title="{{$info['title']}}" {{!$i?"style=color:red":''}}>{{$info['title']}}</a></li>
            @endfor
        </ul>
        <div id="mu" class="cl">
        </div>
        <div id="scbar" class="scbar_narrow cl">@php($info=$data->navigation($firstDomain,$pinyin))
            <form id="scbar_form" method="post" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="{{$info['url']}}" target="_blank">
                <input type="hidden" name="mod" id="scbar_mod" value="search" />
                <input type="hidden" name="formhash" value="8e04b8ae" />
                <input type="hidden" name="srchtype" value="title" />
                <input type="hidden" name="srhfid" value="47" />
                <input type="hidden" name="srhlocality" value="forum::viewthread" />
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="scbar_icon_td"></td>
                        <td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
                        <td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="xg1" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>
                        <td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"><strong class="xi2">搜索</strong></button></td>
                        <td class="scbar_hot_td">
                            <div id="scbar_hot">
                                <strong class="xw1 xi4">热搜: </strong>
                                @for($i=0;$i<8;$i++)
                                    @php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}" target="_blank" class="xi4" sc="1">{{$info['title']}}</a>
                                @endfor
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <ul id="scbar_type_menu" class="p_pop" style="display: none;">
            <li><a href="javascript:;" rel="curforum" fid="47" >本版</a></li>
            <li><a href="javascript:;" rel="forum">帖子</a></li>
            <li><a href="javascript:;" rel="user">用户</a></li>
        </ul>
        <script type="text/javascript">
            initSearchmenu('scbar', '');
        </script>
    </div>
</div>
<div id="wp" class="wp">
    <script type="text/javascript">var fid = parseInt('47'), tid = parseInt('13925');</script>
    <script src="data/cache/forum_viewthread.js?BO3" type="text/javascript"></script>
    <script type="text/javascript">zoomstatus = parseInt(1);var imagemaxwidth = '807';var aimgcount = new Array();</script>
    <style id="diy_style" type="text/css"></style>
    <!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]-->
    <div id="pt" class="bm cl">
        <div class="z">
            @php($info=$data->navigation($firstDomain,$pinyin))
            <a href="{{$info['url']}}" class="nvhm" title="{{$info['title']}}">{{$info['title']}}</a><em>&raquo;</em>
            @for($i=0;$i<4;$i++)
                @php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}">{{$info['title']}}</a><em>&rsaquo;</em>
            @endfor
        </div>
    </div>
    <!--BS To Baidu OK @2021-02-27 18:21:00--><style id="diy_style" type="text/css"></style>
    <div class="wp">
        <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
    </div>
    <div id="ct" class="wp cl">
        <div id="pgt" class="pgs mbm cl ">
            <div class="pgt"></div>
            <span class="y pgb"> @php($info=$data->navigation($firstDomain,$pinyin))
                <a href="{{$info['url']}}">返回列表</a>
            </span>@php($info=$data->navigation($firstDomain,$pinyin))
            <a id="newspecial" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})" onclick="showWindow('newthread', '{{$info['url']}}')" href="javascript:;" title="发新帖"><img src="static/image/common/pn_post.png" alt="发新帖" /></a></div>
        <div id="postlist" class="pl bm">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td class="pls ptn pbn">
                        <div class="hm ptn">
                            <span class="xg1">查看:</span> <span class="xi1">{{mt_rand(100,9999)}}</span><span class="pipe">|</span><span class="xg1">回复:</span> <span class="xi1">0</span>
                        </div>
                    </td>
                    <td class="plc ptm pbn vwthd">
                        <div class="y">@php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank"><img src="static/image/common/print.png" alt="{{$info['title']}}" class="vm" /></a>
                            @php($info=$data->navigation($firstDomain,$pinyin))<a href="{{$info['url']}}" title="{{$info['title']}}"><img src="static/image/common/thread-prev.png" alt="{{$info['title']}}" class="vm" /></a>
                            @php($info=$data->navigation($firstDomain,$pinyin))<a href="{{$info['url']}}" title="{{$info['title']}}"><img src="static/image/common/thread-next.png" alt="{{$info['title']}}" class="vm" /></a>
                        </div>
                        <h1 class="ts">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}">{{$info['title']}}</a>
                            <span id="thread_subject">{!! $title !!}</span>
                        </h1>
                        <span class="xg1">
                            @php($info=$data->navigation($firstDomain,$pinyin))
                            <a href="{{$info['url']}}" onclick="return copyThreadUrl(this, '{{$info['title']}}')" >[复制链接]</a>
                        </span>
                    </td>
                </tr>
            </table>
            <table cellspacing="0" cellpadding="0" class="ad">
                <tr>
                    <td class="pls">
                    </td>
                    <td class="plc">
                    </td>
                </tr>
            </table><div id="post_28032" ><table id="pid28032" class="plhin" summary="pid28032" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pls" rowspan="2">
                            <div id="favatar28032" class="pls favatar">
                                <a name="lastpost"></a><div class="pi"> @php($info=$data->content($firstDomain,$pinyin))
                                    <div class="authi"><a href="{{$info['url']}}" target="_blank" class="xw1">{{$anthor}}</a>
                                    </div>
                                </div>
                                <div class="p_pop blk bui card_gender_0" id="userinfo28032" style="display: none; margin-top: -11px;">
                                    <div class="m z">
                                        <div id="userinfo28032_ma"></div>
                                    </div>
                                    <div class="i y">
                                        <div>
                                            <strong><a href="{{$info['url']}}" target="_blank" class="xi2">{{$anthor}}</a></strong>
                                            <em>当前离线</em>
                                        </div><dl class="cl">
                                            <dt>积分</dt><dd>
                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_blank" class="xi2">{{mt_rand(1,999)}}</a>
                                            </dd>
                                        </dl><div class="imicn">@php($info=$data->content($firstDomain,$pinyin))
                                            <a href="{{$info['url']}}" target="_blank" title="{{$info['title']}}"><img src="static/image/common/userinfo.gif" alt="{{$info['title']}}" /></a>
                                        </div>
                                        <div id="avatarfeed"><span id="threadsortswait"></span></div>
                                    </div>
                                </div>
                                <div>@php($info=$data->content($firstDomain,$pinyin))
                                    <div class="avatar" onmouseover="showauthor(this, 'userinfo28032')">
                                        <a href="{{$info['url']}}" class="avtm" target="_blank">
                                            <img src="https://www.17jita.com/uc_server/avatar.php?uid=109585&size=middle" /></a>
                                    </div>
                                </div>
                                <div class="tns xg2">
                                    <table cellspacing="0" cellpadding="0">
                                        <th>
                                            <p>@php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" class="xi2">{{mt_rand(1,999)}}</a>
                                            </p>{{$info['title']}}
                                        </th>
                                        <th>
                                            <p>@php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" class="xi2">{{mt_rand(1,999)}}</a>
                                            </p>{{$info['title']}}
                                        </th>@php($info=$data->content($firstDomain,$pinyin))
                                        <td><p><a href="{{$info['url']}}" class="xi2">{{mt_rand(1,999)}}</a></p>{{$info['title']}}</td>
                                    </table>
                                </div>@php($info=$data->content($firstDomain,$pinyin))
                                <p><em><a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a></em></p>
                                <p><span id="g_up28032" onmouseover="showMenu({'ctrlid':this.id, 'pos':'12!'});">
                                        <img src="static/image/common/star_level1.gif" alt="Rank: 1" /></span>
                                </p>
                                <div id="g_up28032_menu" class="tip tip_4" style="display: none;">
                                    <div class="tip_horn"></div>
                                    <div class="tip_c">初来咋到, 积分 {{mt_rand(1,999)}}, 距离下一级还需 {{mt_rand(1,999)}} 积分</div></div>
                                <p><span class="pbg2"  id="upgradeprogress_28032" onmouseover="showMenu({'ctrlid':this.id, 'pos':'12!', 'menuid':'g_up28032_menu'});">
                                        <span class="pbr2" style="width:2%;"></span></span></p>
                                <div id="g_up28032_menu" class="tip tip_4" style="display: none;"><div class="tip_horn"></div>
                                    <div class="tip_c">初来咋到, 积分 {{mt_rand(1,999)}}, 距离下一级还需 {{mt_rand(1,999)}} 积分</div></div>
                                <dl class="pil cl">@php($info=$data->content($firstDomain,$pinyin))
                                    <dt>积分</dt><dd><a href="{{$info['url']}}" target="_blank" class="xi2">{{mt_rand(1,999)}}</a></dd>
                                </dl>
                                <dl class="pil cl"></dl><ul class="xl xl2 o cl">@php($info=$data->content($firstDomain,$pinyin))
                                    <li class="pm2"><a href="{{$info['url']}}" onclick="showWindow('sendpm', this.href);" title="{{$info['title']}}" class="xi2">{{$info['title']}}</a></li>
                                </ul>
                            </div>
                        </td>
                        <td class="plc">
                            <div class="pi">
                                <div id="fj" class="y">
                                    <label class="z">电梯直达</label>@php($info=$data->content($firstDomain,$pinyin))
                                    <input type="text" class="px p_fre z" size="2" onkeyup="$('fj_btn').href='{{$info['url']}}" onkeydown="if(event.keyCode==13) {window.location=$('fj_btn').href;return false;}" title="跳转到指定楼层" />
                                    <a href="javascript:;" id="fj_btn" class="z" title="跳转到指定楼层"><img src="static/image/common/fj_btn.png" alt="跳转到指定楼层" class="vm" /></a>
                                </div>
                                <strong>@php($info=$data->content($firstDomain,$pinyin))
                                    <a href="{{$info['url']}}"   id="postnum28032" onclick="setCopy(this.href, '帖子地址复制成功');return false;">
                                        1楼-楼主</a>
                                </strong>
                                <div class="pti">
                                    <div class="pdbt">
                                    </div>
                                    <div class="authi">
                                        <img class="authicn vm" id="authicon28032" src="static/image/common/online_member.gif" />
                                        <em id="authorposton28032">发表于 {{date('Y-m-d H:i:s',time()-900000)}}</em>
                                        <span class="pipe">|</span>@php($info=$data->content($firstDomain,$pinyin))
                                        <a href="{{$info['url']}}" rel="nofollow">只看该作者</a>
                                        <span class="none"><img src="static/image/common/arw_r.gif" class="vm" alt="回帖奖励" /></span>@php($info=$data->content($firstDomain,$pinyin,$type))
                                        <span class="pipe show">|</span><a href="{{$info['url']}}"  class="show">倒序浏览</a>
                                        <span class="pipe show">|</span><a href="javascript:;" onclick="readmode($('thread_subject').innerHTML, 28032);" class="show">阅读模式</a>
                                    </div>
                                </div>
                            </div><div class="pct"><style type="text/css">.pcb{margin-right:0}</style><div class="pcb">
                                    <div class="t_fsz">
                                        <table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_28032">
                                            {{$info['article']}}<br />
                                                </td></tr></table>
                                        <div class="ptg mbm mtn">
                                            @for($i=0;$i<2;$i++)@php($info=$data->content($firstDomain,$pinyin))
                                                <a title="{{$info['title']}}" href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>,
                                            @endfor
                                                @php($info=$data->content($firstDomain,$pinyin))
                                            <a title="{{$info['title']}}" href="{{$info['url']}}" target="_blank">{{$info['title']}}</a>
                                        </div>

                                    </div>
                                    <div id="comment_28032" class="cm">
                                    </div>
                                    <div id="post_rate_div_28032"></div>
                                </div>
                            </div>
                        </td></tr>
                    <tr><td class="plc plm">
                            <div id="p_btn" class="mtw mbm hm cl"> @php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖"><i><img src="static/image/common/fav.gif" alt="收藏" />收藏<span id="favoritenumber" style="display:none">0</span></i></a>
                                @php($info=$data->content($firstDomain,$pinyin))<a id="recommend_add" href="{{$info['url']}}"  onclick="showWindow('login', this.href)" onmouseover="this.title = $('recommendv_add').innerHTML + ' 人赞一下！'" title="顶一下"><i><img src="static/image/common/rec_add.gif" alt="赞一下！" />赞一下！<span id="recommendv_add" style="display:none">0</span></i></a>
                                @php($info=$data->content($firstDomain,$pinyin))<a id="recommend_subtract" href="{{$info['url']}}"  onclick="showWindow('login', this.href)" onmouseover="this.title = $('recommendv_subtract').innerHTML + ' 人踩一下！'" title="踩一下"><i><img src="static/image/common/rec_subtract.gif" alt="踩一下！" />踩一下！<span id="recommendv_subtract" style="display:none">0</span></i></a>
                            </div>
                            <div class="mtw mbw">
                                <h3 class="pbm mbm bbda">相关帖子</h3>
                                <ul class="xl xl2 cl">
                                    @for($i=0;$i<10;$i++)
                                        @php($info=$data->content($firstDomain,$pinyin))
                                        <li>&#8226; <a href="{{$info['url']}}" title="{{$info['title']}}" target="_blank">{{$info['title']}}</a></li>
                                    @endfor
                                </ul>
                            </div>@php($info=$data->content($firstDomain,$pinyin))
                            <div class="sign"><a href="{{$info['url']}}"><b style="color:#55A51C;font-size:18px;">{{$info['title']}}</b></a></div>
                        </td>
                    </tr>
                    <tr id="_postposition28032"></tr>
                    <tr>
                        <td class="pls"></td>
                        <td class="plc" style="overflow:visible;">
                            <div class="po hin">
                                <div class="pob cl">
                                    <em>@php($info=$data->content($firstDomain,$pinyin))
                                        <a class="fastre" href="{{$info['url']}}" onclick="showWindow('reply', this.href)">回复</a>
                                    </em>

                                    <p>
                                        <a href="javascript:;" onclick="showWindow('miscreport28032', 'misc.php?mod=report&rtype=post&rid=28032&tid=13925&fid=47', 'get', -1);return false;">举报</a>
                                    </p>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="ad">
                        <td class="pls">
                        </td>
                        <td class="plc">
                        </td>
                    </tr>
                </table>
            </div><div id="postlistreply" class="pl"><div id="post_new" class="viewthread_table" style="display: none"></div></div>
        </div>
        <form method="post" autocomplete="off" name="modactions" id="modactions">
            <input type="hidden" name="formhash" value="8e04b8ae" />
            <input type="hidden" name="optgroup" />
            <input type="hidden" name="operation" />
            <input type="hidden" name="listextra" value="" />
            <input type="hidden" name="page" value="1" />
        </form>
        <div class="pgs mtm mbm cl">@php($info=$data->content($firstDomain,$pinyin))
            <span class="pgb y"><a href="{{$info['url']}}">返回列表</a></span>@php($info=$data->content($firstDomain,$pinyin))
            <a id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})" onclick="showWindow('newthread', '{{$info['url']}}')" href="javascript:;" title="发新帖"><img src="static/image/common/pn_post.png" alt="发新帖" /></a>
        </div>

        <!--[diy=diyfastposttop]--><div id="diyfastposttop" class="area"></div><!--[/diy]-->
        <script type="text/javascript">
            var postminchars = parseInt('4');
            var postmaxchars = parseInt('20000');
            var disablepostctrl = parseInt('0');
        </script>
        <div id="f_pst" class="pl bm bmw">@php($info=$data->content($firstDomain,$pinyin))
            <form method="post" autocomplete="off" id="fastpostform" action="{{$info['url']}}" onSubmit="return fastpostvalidate(this)">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pls">
                        </td>
                        <td class="plc">
                            <span id="fastpostreturn"></span>
                            <div class="cl">
                                <div id="fastsmiliesdiv" class="y"><div id="fastsmiliesdiv_data"><div id="fastsmilies"></div></div></div><div class="hasfsl" id="fastposteditor">
                                    <div class="tedt mtn">
                                        <div class="bar">
<span class="y">@php($info=$data->content($firstDomain,$pinyin))
<a href="{{$info['url']}}" onclick="return switchAdvanceMode(this.href)">高级模式</a>
</span><script src="data/cache/seditor.js?BO3" type="text/javascript"></script>
                                            <div class="fpd">
                                                <a href="javascript:;" title="文字加粗" class="fbld">B</a>
                                                <a href="javascript:;" title="设置文字颜色" class="fclr" id="fastpostforecolor">Color</a>
                                                <a id="fastpostimg" href="javascript:;" title="图片" class="fmg">Image</a>
                                                <a id="fastposturl" href="javascript:;" title="添加链接" class="flnk">Link</a>
                                                <a id="fastpostquote" href="javascript:;" title="引用" class="fqt">Quote</a>
                                                <a id="fastpostcode" href="javascript:;" title="代码" class="fcd">Code</a>
                                                <a href="javascript:;" class="fsml" id="fastpostsml">Smilies</a>
                                            </div></div>
                                        <div class="area">
                                            <div class="pt hm">
                                                您需要登录后才可以回帖 @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" onclick="showWindow('login', this.href)" class="xi2">登录</a> |
                                                @php($info=$data->content($firstDomain,$pinyin))<a href="{{$info['url']}}" class="xi2">立即注册</a>

                                                @php($info=$data->content($firstDomain,$pinyin))
                                                <a href="{{$info['url']}}" target="_top" rel="nofollow"><img src="static/image/common/qq_login.gif" class="vm" /></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="seccheck_fastpost">
                            </div>
                            <input type="hidden" name="formhash" value="8e04b8ae" />
                            <input type="hidden" name="usesig" value="" />
                            <input type="hidden" name="subject" value="  " />
                            <p class="ptm pnpost">@php($info=$data->content($firstDomain,$pinyin))
                                <a href="{{$info['url']}}" class="y" target="_blank">本版积分规则</a>@php($info=$data->content($firstDomain,$pinyin))
                                <button type="button" onclick="showWindow('login', '{{$info['url']}}')"  onmouseover="checkpostrule('seccheck_fastpost', 'ac=reply');this.onmouseover=null" name="replysubmit" id="fastpostsubmit" class="pn pnc vm" value="replysubmit" tabindex="5"><strong>发表回复</strong></button>
                                <label for="fastpostrefresh"><input id="fastpostrefresh" type="checkbox" class="pc" />回帖后跳转到最后一页</label>
                                <script type="text/javascript">if(getcookie('fastpostrefresh') == 1) {$('fastpostrefresh').checked=true;}</script>
                            </p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script type="text/javascript">
            new lazyload();
        </script>@php($info=$data->content($firstDomain,$pinyin))
        <script type="text/javascript">document.onkeyup = function(e){keyPageScroll(e, 0, 0, '{{$info['url']}}', 1);}</script>
    </div>

    <div class="wp mtn">
        <!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
    </div>

    <script type="text/javascript">
        function succeedhandle_followmod(url, msg, values) {
            var fObj = $('followmod_'+values['fuid']);
            if(values['type'] == 'add') {
                fObj.innerHTML = '不收听';@php($info=$data->content($firstDomain,$pinyin))
                fObj.href = {{$info['url']}}
            } else if(values['type'] == 'del') {
                fObj.innerHTML = '收听TA';@php($info=$data->content($firstDomain,$pinyin))
                fObj.href = {{$info['url']}};
            }
        }
        fixed_avatar([28032], 1);
    </script>	</div>
<div id="ft" class="cl">
    <div class="wp cl">
        <div id="flk" class="y">
            <p>@php($info=$data->content($firstDomain,$pinyin))
                <a href="{{$info['url']}}" title="{{$info['title']}}" >关于我们</a><span class="pipe">|
                @php($info=$data->content($firstDomain,$pinyin))</span><strong><a href="{{$info['url']}}" target="_blank">{{$info['title']}}</a></strong>
            </p>
            <p class="xs0">
                GMT+8, {{date('Y-m-d H:i:s',time()-900000)}}<span id="debuginfo">@php($info=$data->content($firstDomain,$pinyin))
<a href="{{$info['url']}}" target="_blank" style="color: blue">服务器构架在阿里云</a>
</span>
            </p>
        </div>
        <div id="frt">@php($info=$data->content($firstDomain,$pinyin))
            <p>Powered by <strong><a href="{{$info['url']}}" target="_blank" rel="nofollow">Discuz!</a></strong> <em>X3.4</em></p>
            <p class="xs0">&copy; 2010-{{date('Y',time())}} @php($info=$data->content($firstDomain,$pinyin))<a href="{{$info['url']}}">{{$info['url']}}</a></p>
        </div></div>
</div>
<div id="scrolltop">
    <span>@php($info=$data->content($firstDomain,$pinyin))
        <a href="{{$info['url']}}" onclick="showWindow('reply', this.href)" class="replyfast" title="快速回复"><b>快速回复</b></a></span>
    <span>@php($info=$data->content($firstDomain,$pinyin))
<a href="{{$info['url']}}" hidefocus="true" class="returnlist" title="返回列表"><b>返回列表</b></a>
</span>
    <span hidefocus="true"><a title="官方微信" href="javascript:;" class="weixin" onclick="showWindow('weixin', 'weixin.php');return false;"><b>官方微信</b></a></span>
    <span hidefocus="true"><a title="返回顶部" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>返回顶部</b></a></span>
</div>

<script type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();</script>
</body>
</html>
