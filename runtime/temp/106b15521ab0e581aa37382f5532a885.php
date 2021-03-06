<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\PHPTutorial\WWW\test1\cltphp/app/home\view\page_show_contace.html";i:1515137982;s:62:"D:\PHPTutorial\WWW\test1\cltphp/app/home\view\common_head.html";i:1515137982;s:64:"D:\PHPTutorial\WWW\test1\cltphp/app/home\view\common_footer.html";i:1515137982;}*/ ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="zh-cn"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="zh-cn"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="zh-cn"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title><?php if($info['title']): ?><?php echo $info['title']; elseif($title): ?><?php echo $title; else: ?><?php echo $sys['title']; endif; ?></title>
    <meta name="keywords" content="<?php if($info['keywords']): ?><?php echo $info['keywords']; elseif($keywords): ?><?php echo $keywords; else: ?><?php echo $sys['key']; endif; ?>" />
    <meta name="description" content="<?php if($info['description']): ?><?php echo $info['description']; elseif($description): ?><?php echo $description; else: ?><?php echo $sys['des']; endif; ?>" />
    <!-- ////////////////////////////////// -->
    <!-- //      Stylesheets Files       // -->
    <!-- ////////////////////////////////// -->
    <link rel="stylesheet" href="__HOME__/css/base.css" id="camera-css" />
    <link rel="stylesheet" href="__HOME__/css/framework.css" />
    <link rel="stylesheet" href="__HOME__/css/style.css" />
    <link rel="stylesheet" href="__HOME__/css/noscript.css" media="screen,all" id="noscript" />

    <!-- ////////////////////////////////// -->
    <!-- //     Google Webfont Files     // -->
    <!-- ////////////////////////////////// -->


    <!-- ////////////////////////////////// -->
    <!-- //        Favicon Files         // -->
    <!-- ////////////////////////////////// -->
    <link rel="shortcut icon" href="__HOME__/images/favicon.ico" />

    <!-- ////////////////////////////////// -->
    <!-- //      Javascript Files        // -->
    <!-- ////////////////////////////////// -->
    <script>
        var HOME = '__HOME__';
    </script>
    <script src="__HOME__/js/jquery.min.js"></script>
    <script src="__HOME__/js/jquery.easing-1.3.min.js"></script>
    <script src="__HOME__/js/tooltip.js"></script>
    <script src="__HOME__/js/dropdown.js"></script>
    <script src="__HOME__/js/tinynav.min.js"></script>
    <script src="__HOME__/js/camera.min.js"></script>
    <script src="__HOME__/js/jquery.fancybox.js?v=2.0.6"></script>
    <script src="__HOME__/js/jquery.fancybox-media.js?v=1.0.3"></script>
    <script src="__HOME__/js/jquery.ui.totop.min.js"></script>
    <script src="__HOME__/js/ddaccordion.js"></script>
    <script src="__HOME__/js/jquery.twitter.js"></script>
    <script src="__HOME__/js/jflickrfeed.min.js"></script>
    <script src="__HOME__/js/faq-functions.js"></script>
    <script src="__HOME__/js/isotope.js"></script>
    <script src="__HOME__/js/theme-functions.js"></script>
    <script>
        //设为首页 www.jb51.net
        function SetHome(obj,url){
            try{
                obj.style.behavior='url(#default#homepage)';
                obj.setHomePage(url);
            }catch(e){
                if(window.netscape){
                    try{
                        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                    }catch(e){
                        alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
                    }
                }else{
                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
                }
            }
        }

        //收藏本站 www.jb51.net
        function AddFavorite(title, url) {
            try {
                window.external.addFavorite(url, title);
            }
            catch (e) {
                try {
                    window.sidebar.addPanel(title, url, "");
                }
                catch (e) {
                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请进入新网站后使用Ctrl+D进行添加");
                }
            }
        }
    </script>
    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div class="user">
    <div id="top-social">
        <div class="social-panel">
            <ul>
                <li><a href="javascript:void(0);" onclick="SetHome(this,'<?php echo config('url_domain_root'); ?>');">设为首页</a></li>
                <li><a href="javascript:void(0);" onclick="AddFavorite('<?php echo config('sys_name'); ?>','<?php echo config('url_domain_root'); ?>')">加入收藏</a></li>
                <li><a href="<?php echo url('user/index/index'); ?>" target="_blank"><?php if(session('user.username')): ?><?php echo session('user.username'); else: ?>会员中心<?php endif; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!-- header start here -->
<header>
    <div id="main-wrapper">
        <!-- logo start here -->
        <div id="logo">
            <a href="<?php echo url('home/index/index'); ?>" title="CLTPHP内容管理系统"><img src="__PUBLIC__<?php echo $sys['logo']; ?>" alt="mainlogo" /></a>
        </div>
        <!-- logo end here -->
        <!-- mainmenu start here -->
        <nav id="mainmenu">
            <ul id="menu">
                <li <?php if($controller == 'index'): ?>class="selected"<?php endif; ?>><a href="<?php echo url('home/index/index'); ?>" title="CLTPHP内容管理系统">首页</a></li>

                <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li <?php if($controller == $vo['catdir']): ?>class="selected"<?php endif; ?>>
                    <?php if($vo['child'] == 1): ?>
                        <a href="#"><?php echo $vo['catname']; ?></a>
                        <ul>
                            <?php if(is_array($vo['sub']) || $vo['sub'] instanceof \think\Collection || $vo['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <li><a href="<?php echo url('home/'.$vo['catdir'].'/index',['catId'=>$v['id']] ); ?>" title="<?php echo $v['catname']; ?>-CLTPHP内容管理系统"><span>-</span> <?php echo $v['catname']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    <?php else: ?>
                        <a href="<?php echo url('home/'.$vo['catdir'].'/index',['catId'=>$vo['id']] ); ?>" title="<?php echo $vo['catname']; ?>-CLTPHP内容管理系统"><?php echo $vo['catname']; ?></a>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </nav>
        <!-- mainmenu end here -->

    </div>
</header>
<!-- header end here -->
<!-- pagetitle start here -->
<section id="pagetitle-wrapper">
    <div class="pagetitle-content">
        <h2><?php echo $title; ?></h2>
    </div>
</section>
<!-- pagetitle end here -->

<!-- breadcrumb start here -->
<section id="breadcrumb-wrapper">
    <div id="breadcrumb-content">
        <ul>
            <li><a href="<?php echo url('home/index/index'); ?>" title="<?php echo $sys['title']; ?>">首页</a></li>
            <li><a href="<?php echo url('home/'.MODULE_NAME.'/index',array('catId'=>input('catId'))); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
            <li><?php echo $info['title']; ?></li>
        </ul>
    </div>
</section>

<section id="content-wrapper">
    <div class="row">
        <div class="six columns">
            <h5>留下您宝贵的意见</h5>
            <div id="contact-form-area">
                <!-- Contact Form Start //-->
                <form action="#" id="contactform" />
                <fieldset>
                    <label>标题 <em>*</em></label>
                    <input type="text" name="title" class="textfield" id="title" value="" />
                    <label>称呼 <em>*</em></label>
                    <input type="text" name="name" class="textfield" id="name" value="" />
                    <label>邮箱 <em>*</em></label>
                    <input type="text" name="email" class="textfield" id="email" value="" />
                    <textarea name="content" id="content" class="textarea" cols="2" rows="4"></textarea>
                    <div class="clear"></div>
                    <label>&nbsp;</label>
                    <input type="button" name="submit" class="buttoncontact" id="buttonsend" value="提交" />
                    <span class="loading" style="display: none;">Please wait..</span>
                    <div class="clear"></div>
                </fieldset>
                </form>
                <!-- Contact Form End //-->
            </div>
        </div>
        <div class="six columns">
            <div class="panel stamp">
                <h5>联系信息</h5>
                <?php echo $info['content']; ?>
                <ul class="contact-info">
                    <li class="address-icon"><a href="http://www.cltphp.com" title="CLTPHP">CLTPHP</a></li>
                    <li class="qq-icon"><a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=ebcb5f6099570a3a1429036f42f787b9eea835fdbf6ded8eaee2a546855cce97"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="CLTPHP交流群0002" title="CLTPHP交流群0002"></a></li>
                    <li class="qq-icon">站长QQ号 : <a href="tencent://message/?uin=1109305987&Site=&Menu=yes" title="点击加好友">1109305987</a></li>
                    <li class="email-icon">Email : 1109305987@qq.com</li>
                    <li class="time-icon">当前时间: <?php echo toDate(time(),'Y-m-d H:i:s'); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="twelve columns">

        </div>
    </div>
</section>
<script>
    $('#buttonsend').click(function(){
        var title = $('#title').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var content = $('#content').val();
        if($.trim(title)==''){
            alert('标题不能为空');
            return false;
        }
        if($.trim(name)==''){
            alert('称呼不能为空');
            return false;
        }
        if($.trim(email)==''){
            alert('邮箱不能为空');
            return false;
        }
        if($.trim(content)==''){
            alert('内容不能为空');
            return false;
        }
        $.post("<?php echo url('senMsg'); ?>",{title:title,name:name,email:email,content:content},function(data){
            if(data.status==1){
                alert('留言成功！感谢您对我们的支持！');
                window.location.href = "<?php echo url('home/contact/index',array('catId'=>input('catId'))); ?>"
            }else{
                alert('留言失败！重新提交试试！');
            }
        })
    })
</script>
<!-- maincontent end here -->
<!-- footer start here -->
<footer>
    <div class="row">
        <div class="three columns mobile-two">
            <img src="__HOME__/images/logo2.png" alt="CLTPHP" class="img-left" />
            <p class="copyright-text">
                &copy;<?php echo $sys['copyright']; ?> <a href="http://www.cltphp.com/" style="color: #747373" rel="external" title="<?php echo $sys['title']; ?>"><?php echo $sys['title']; ?></a><br>
                <a href="http://www.miitbeian.gov.cn/" style="color: #747373" target="_blank" rel="nofollow"><?php echo $sys['bah']; ?></a><br>
            </p>
        </div>
        <div class="three columns mobile-two">
            <h5>联系我们</h5>
            <ul>
                <li class="address-icon"><a href="http://www.cltphp.com" title="<?php echo $sys['title']; ?>"><?php echo $sys['title']; ?></a></li>
                <li class="qq-icon"><a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=ebcb5f6099570a3a1429036f42f787b9eea835fdbf6ded8eaee2a546855cce97"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="CLTPHP交流群0002" title="CLTPHP交流群0002"></a></li>
                <li class="qq-icon">站长QQ号 : <a target="_blank" rel="nofollow" title="点击加好友" href="tencent://message/?uin=1109305987&Site=&Menu=yes">1109305987</a></li>
                <li class="email-icon">Email : 1109305987@qq.com</li>
            </ul>
        </div>
        <div class="three columns mobile-two">
            <h5>友情链接</h5>
            <ul>
                <?php if(is_array($linkList) || $linkList instanceof \think\Collection || $linkList instanceof \think\Paginator): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $vo['url']; ?>" rel="external" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <li><a href="https://www.kancloud.cn/chichu/cltphp" target="_blank" rel="nofollow" title="CLTPHP操作开发手册">CLTPHP操作开发手册</a></li>
            </ul>
        </div>
        <div class="three columns mobile-two">
            <h5>扫码捐助</h5>
            <div class="wxsq">
                <img src="__HOME__/images/wxsq.png" alt="CLTPHP微信二维码" title="CLTPHP微信二维码">
            </div>
        </div>
    </div>
</footer>
<!-- footer end here -->
<script>
    $('#noscript').remove();
    jQuery(function($){
        //external加上target="_blank"
        $("a[rel*=external]").attr("target","_blank");
    });
</script>
</body>
</html>