<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\PHPTutorial\WWW\test1\cltphp/app/admin\view\wechat\replay.html";i:1515137982;s:63:"D:\PHPTutorial\WWW\test1\cltphp/app/admin\view\common\head.html";i:1515137982;s:63:"D:\PHPTutorial\WWW\test1\cltphp/app/admin\view\common\foot.html";i:1515137982;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__STATIC__/common/css/font.css" media="all">
</head>
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_base.css">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_index.css">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_tooltip.css">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_lib.css"/>
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_richvideo.css"/>
<link rel="stylesheet" type="text/css" href="__ADMIN__/defau.css">

<style>
    .draggable-element {  display: inline-block;  text-align: center;  color: rgb(51, 51, 51);  cursor: move;  }
    body {  background: #fff;}
    .layui-table-cell{height: auto;}
    .layui-table-cell ul li a{color: #1C8FEF;display: block;border: 1px solid #ececec;padding: 3px 8px;}
    .layui-table-cell ul li a:hover{color: #005580}
    .layui-table-view{margin: 0;}
    .layui-table{margin: 0;}

    .step_0{text-align:center;margin-top:100px;}
    .reply-div{border:1px solid #d3d3d3;width:360px;padding:15px;margin-top:20px;}
    .cover-div{background:#f5f5f5;position:relative;}
    .cover-title{position:absolute;left:0;bottom:0;background:#000;color:#fff;width:350px;padding:5px;opacity:0.6;}
    .cover-pic{max-width:360px;max-height:200px;margin:auto;display:block;}
    .reply-one p,h5{padding:3px 0;}
    .reply-one p{color:#999;font-size:13px;}
    ul.reply-more li{border-bottom:1px solid #d3d3d3;padding:10px 0;}
    ul.reply-more li:after{content:'';clear:both;display:block;}
    ul.reply-more li:last-child{border-bottom:0px solid #d3d3d3;padding-bottom:0;}
    ul.reply-more li:first-child{padding-top:0;}
    .media-div-l{width:270px;margin-right:10px;float:left;}
    .media-div-r{width:80px;float:right;}
    .media-img{max-width:80px;max-height:200px;margin:auto;display:block;}
    .media-button{border:1px solid #d3d3d3;width:390px;border-top:0px solid #d3d3d3;background:#e7e7eb;display:table;}
    .media-button a{display:inline-block;width:194.5px;text-align:center;padding:10px 0;}
    .media-button a:first-child{border-right:1px solid #d3d3d3;box-sizing: border-box;}
</style>
<script src="__STATIC__/common/js/jquery-1.8.1.min.js"></script>
<script src="__STATIC__/common/js/drag-arrange.js"></script>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<div class="dialog_wrp media align_edge ui-draggable" style="display:none;width: 960px; margin-left: -480px; margin-top: -313.5px;" id="dialog_media">
    <div class="dialog">
        <div class="dialog_hd">
            <h3>选择素材</h3>
            <!--#0001#-->
            <a href="javascript:;" onclick="closeMaterial()" class="icon16_opr closed pop_closed">关闭</a>
            <!--%0001%-->
        </div>
        <div class="dialog_bd">
            <div class="dialog_media_container appmsg_media_dialog">
                <div class="sub_title_bar in_dialog">
                    <div class="search_bar js-btn-media">
                        <a class="layui-btn layui-btn-primary layui-btn-small" data-type="1" href="javascript:;" onclick="checkBtn(this)"> 文本 </a>
                        <a class="layui-btn layui-btn-normal layui-btn-small" data-type="2" href="javascript:;" onclick="checkBtn(this)"> 单图文 </a>
                        <a class="layui-btn layui-btn-primary layui-btn-small" data-type="3" href="javascript:;" onclick="checkBtn(this)"> 多图文 </a>
                    </div>
                    <div class="appmsg_create tr">
                        <a class="layui-btn layui-btn-small" href="<?php echo url('addmedia',['url'=>'menu']); ?>"> 新建图文消息 </a>
                    </div>
                </div>
                <div class="dialog_media_inner" style="overflow:auto;">
                    <div class="table_wrp user_list">
                        <table class="layui-table" id="list" lay-filter="list"></table>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog_ft_page">
        </div>
    </div>
</div>
<div class="mask mask_metar" style="display: none;"></div>
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>添加消息</legend>
    </fieldset>
    <div class="RIGHT">
        <div class="ns-main">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <?php if(is_array($child_menu_list) || $child_menu_list instanceof \think\Collection || $child_menu_list instanceof \think\Paginator): if( count($child_menu_list)==0 ) : echo "" ;else: foreach($child_menu_list as $k=>$child_menu): if($child_menu['active'] == '1'): ?>
                    <li class="layui-this"><a href="<?php echo $child_menu['url']; ?>"><?php echo $child_menu['menu_name']; ?></a></li>
                    <?php else: ?>
                    <li><a href="<?php echo $child_menu['url']; ?>"><?php echo $child_menu['menu_name']; ?></a></li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; if($type == '2'): ?>
                    <li style="float: right">
                        <a class="nscs-table-handle_green" href="<?php echo url('addorupdatekeyreplay'); ?>"><i class="fa fa-plus-circle"></i>&nbsp;添加关键词回复</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if($type == '1'): ?>
            <div id="type1">
                <p class="step_0" style="<?php if(!$info): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">您还未设置回复内容，
                    <a href="javascript:;" onclick="showMaterial()">我要马上设置。</a>
                </p>
                <div class="step_1" style="<?php if(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty())): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
                <!-- 样式模板 -->
                    <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['media_info']['type'] == '1'): ?>
                    <div class="reply-div">
                        <div class="reply-text">
                            <p><?php echo $info['media_info']['title']; ?></p>
                        </div>
                    </div>
                    <?php endif; if($info['media_info']['type'] == '2'): ?>
                    <div class="reply-div">
                        <div class="reply-one">
                            <h5><?php echo $info['media_info']['title']; ?></h5>
                            <p>xx月xx日</p>
                            <div class="cover-div">
                                <?php if($info['media_info']['item_list'][0]['cover'] != ''): ?>
                                <img class="cover-pic" src="__PUBLIC__<?php echo $info['media_info']['item_list'][0]['cover']; ?>">
                                <?php else: ?>
                                <img class="cover-pic">
                                <?php endif; ?>
                            </div>
                            <p><?php echo $info['media_info']['item_list'][0]['summary']; ?></p>
                        </div>
                    </div>
                    <?php endif; if($info['media_info']['type'] == '3'): ?>
                    <div class="reply-div">
                        <ul class="reply-more">
                            <?php if(is_array($info['media_info']['item_list']) || $info['media_info']['item_list'] instanceof \think\Collection || $info['media_info']['item_list'] instanceof \think\Paginator): if( count($info['media_info']['item_list'])==0 ) : echo "" ;else: foreach($info['media_info']['item_list'] as $k=>$v): if($k == '0'): ?>
                            <li>
                                <div class="cover-div">
                                    <?php if($v['cover'] != ''): ?>
                                    <img class="cover-pic" src="__PUBLIC__<?php echo $v['cover']; ?>">
                                    <?php else: ?>
                                    <img class="cover-pic">
                                    <?php endif; ?>
                                    <p class="cover-title"><?php echo $v['title']; ?><p>
                                </div>
                            </li>
                            <?php endif; if($k > '0'): ?>
                            <li>
                                <div class="media-div-l"><p class="media-title"><?php echo $v['title']; ?></p></div>
                                <div class="media-div-r">
                                    <?php if($v['cover'] != ''): ?>
                                    <img class="media-img" src="__PUBLIC__<?php echo $v['cover']; ?>">
                                    <?php else: ?>
                                    <img class="media-img">
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <?php endif; endif; ?>
                    <div class="media-button">
                        <a class="" href="javascript:;" onclick="showMaterial()">修改</a>
                        <a class="" href="javascript:;" onclick="delReply()">删除</a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id" value="<?php echo $info['id']; ?>">
            <script>
                /**
                 * 添加 或 修改 关注时回复
                 */
                function addOrUpdateFollowReply(media_id){
                    var id = $("#id").val();
                    var type = $("#type").val();
                    $.ajax({
                        url : "<?php echo url('addorupdatefollowreply'); ?>",
                        type : "post",
                        async : true,
                        data : { "media_id" : media_id, "id" : id },
                        success : function(data){
                            if(data.code > 0){
                                $('#id').val(data.code);
                                layer.alert(data.msg);
                            }else{
                                layer.alert(data.msg,{icon:2});
                            }
                        }
                    })
                }
            </script>
            <?php endif; if($type == '3'): ?>
            <div id="type3">
                <p class="step_0" style="<?php if(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty())): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
                    您还未设置回复内容，<a href="javascript:;" onclick="showMaterial()">我要马上设置。</a>
                </p>
                <div class="step_1" style="<?php if(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty())): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
                    <!-- 样式模板 -->
                    <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['media_info']['type'] == '1'): ?>
                    <div class="reply-div">
                        <div class="reply-text">
                            <p><?php echo $info['media_info']['title']; ?></p>
                        </div>
                    </div>
                    <?php endif; if($info['media_info']['type'] == '2'): ?>
                    <div class="reply-div">
                        <div class="reply-one">
                            <h5><?php echo $info['media_info']['title']; ?></h5>
                            <p>xx月xx日</p>
                            <div class="cover-div">
                                <?php if($info['media_info']['item_list'][0]['cover'] == ''): ?>
                                <img class="cover-pic" >
                                <?php else: ?>
                                <img class="cover-pic" src="__PUBLIC__<?php echo $info['media_info']['item_list'][0]['cover']; ?>">
                                <?php endif; ?>
                            </div>
                            <p><?php echo $info['media_info']['item_list'][0]['summary']; ?></p>
                        </div>
                    </div>
                    <?php endif; if($info['media_info']['type'] == '3'): ?>
                    <div class="reply-div">
                        <ul class="reply-more">
                            <?php if(is_array($info['media_info']['item_list']) || $info['media_info']['item_list'] instanceof \think\Collection || $info['media_info']['item_list'] instanceof \think\Paginator): if( count($info['media_info']['item_list'])==0 ) : echo "" ;else: foreach($info['media_info']['item_list'] as $k=>$v): if($k == '0'): ?>
                            <li>
                                <div class="cover-div">
                                    <?php if($v['cover'] !=''): ?>
                                    <img class="cover-pic" src="__PUBLIC__<?php echo $v['cover']; ?>">
                                    <?php else: ?>
                                    <img class="cover-pic">
                                    <?php endif; ?>
                                    <p class="cover-title"><?php echo $v['title']; ?><p>
                                </div>
                            </li>
                            <?php endif; if($k > '0'): ?>
                            <li>
                                <div class="media-div-l"><p class="media-title"><?php echo $v['title']; ?></p></div>
                                <div class="media-div-r">
                                    <?php if($v['cover'] != ''): ?>
                                    <img class="media-img" src="__PUBLIC__<?php echo $v['cover']; ?>">
                                    <?php else: ?>
                                    <img class="media-img">
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <?php endif; endif; ?>
                    <div class="media-button">
                        <a class="" href="javascript:;" onclick="showMaterial()">修改</a>
                        <a class="" href="javascript:;" onclick="delReply()">删除</a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id" value="<?php echo $info['id']; ?>">
            <?php endif; ?>
            <!-- 关键字回复 -->
            <?php if($type == '2'): ?>
            <div class="mod-table">
                <div class="mod-table-head">
                    <div class="style0list">
                        <table class="layui-table" id="list2" lay-filter="list2"></table>
                    </div>
                </div>
            </div>
            <script type="text/html" id="action2">
                <a href="<?php echo url('addorupdatekeyreplay'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs">修改</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
            </script>
            <script>
                layui.use('table', function () {
                    var table = layui.table, $ = layui.jquery;
                    var tableIn = table.render({
                        id: 'msg',
                        elem: '#list2',
                        url: '<?php echo url("keyreplaylist"); ?>',
                        method: 'post',
                        page: true,
                        cols: [[
                            {field: 'key', title: '关键字', width: 250},
                            {field: 'match_type', title: '匹配类型', width: 250},
                            {width: 160, align: 'center', toolbar: '#action2'}
                        ]],
                        limit: 10
                    });
                    table.on('tool(list2)', function(obj) {
                        var data = obj.data;
                        if (obj.event === 'del') {
                            layer.confirm('您确定要删除该回复吗？', function(index){
                                var loading = layer.load(1, {shade: [0.1, '#fff']});
                                $.post("<?php echo url('delKeyReply'); ?>",{id:data.id},function(res){
                                    layer.close(loading);
                                    if(res.code===1){
                                        layer.msg(res.msg,{time:1000,icon:1});
                                        tableIn.reload();
                                    }else{
                                        layer.msg('操作失败！',{time:1000,icon:2});
                                    }
                                });
                                layer.close(index);
                            });
                        }
                    });
                });
            </script>
            <?php endif; ?>
            <input type="hidden" id="type" value="<?php echo $type; ?>">
        </div>
    </div>
</div>
<!-- 操作反馈弹出框 erro 失败-->
<div class="JS_TIPS page_tips success" id="wxTips" style="display:none;">
    <div class="inner"></div>
</div>

<input type="hidden" id="hidden_default_sort"/>
<input type="hidden" id="hidden_default_sub_sort"/>

<div class="mask" style="display: none;" id="maskLayer"></div>

<script type="text/html" id="title">
    <ul>
        {{# for(var l=0; l<d.item_list.length; l++){ }}
        <li><a href="#">{{d.item_list[l]['title']}}</a></li>
        {{# } }}
    </ul>
</script>
<script type="text/html" id="action">
    <a href="javascript:;" class="layui-btn layui-btn-mini remark js_msgSenderRemark" onclick="selectedMaterial({{d.media_id}})">选取</a>
</script>
<script>
    //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;
    });
    LoadingInfo(2);
    function checkBtn(event){
        $(".js-btn-media").find('.layui-btn').removeClass('layui-btn-normal').addClass('layui-btn-primary');
        $(event).removeClass('layui-btn-primary').addClass('layui-btn-normal');
        var type = $(event).attr('data-type');
        LoadingInfo(type);
    }
    /**
     * 显示素材
     */
    function showMaterial(){
        $("#dialog_media").fadeIn(500);
        $(".mask_metar").fadeIn(300);
    }
    /**
     * 选择 图文素材
     */
    function selectedMaterial(media_id){
        getMaterial(media_id);
        closeMaterial();
    }
    /**
     *  取消  关闭
     */
    function closeMaterial(){
        $("#dialog_media").fadeOut(300);
        $(".mask_metar").fadeOut();
    }

    function LoadingInfo(type) {
        layui.use('table', function () {
            var table = layui.table, $ = layui.jquery;
            table.render({
                id: 'msg',
                elem: '#list',
                url: '<?php echo url("onloadmaterial"); ?>',
                method: 'post',
                page: true,
                where:{type:type},
                cols: [[
                    {field: 'title', title: '<?php echo lang("title"); ?>', width: 250, templet: '#title'},
                    {field: 'create_time', title: '创建时间', width: 250},
                    {width: 160, align: 'center', toolbar: '#action'}
                ]],
                limit: 10
            });
        });
    }
    function getMaterial(media_id){
        $.ajax({
            url : "<?php echo url('getweixinmediadetail'); ?>",
            type : "post",
            async : true,
            data : { "media_id" : media_id },
            success : function(data){
                var html = '';
                if(data){
                    html += '<div class="reply-div">';
                    if(data['type'] == 1){
                        html += '<div class="reply-text">';
                        html += '<p>'+data['title']+'</p>';
                        html += '</div>';
                    }else if(data['type'] == 2){
                        html += '<div class="reply-one">';
                        html += '<h5>'+data['item_list'][0]['title']+'</h5>';
                        html += '<p>xx月xx日</p>';
                        html += '<div class="cover-div"><img class="cover-pic" src="__PUBLIC__'+data['item_list'][0]['cover']+'"></div>';
                        html += '<p>'+data['item_list'][0]['summary']+'</p>';
                        html += '</div>';
                    }else if(data['type'] == 3){
                        html += '<ul class="reply-more">';
                        for(var i=0; i < data['item_list'].length; i++){
                            if(i < 1){
                                html += '<li><div class="cover-div">';
                                html += '<img class="cover-pic" src="__PUBLIC__'+data['item_list'][i]['cover']+'">';
                                html += '<p class="cover-title">'+data['item_list'][i]['title']+'<p>';
                                html += '</div></li>';
                            }else{
                                html += '<li>';
                                html += '<div class="media-div-l"><p class="media-title">'+data['item_list'][i]['title']+'</p></div>';
                                html += '<div class="media-div-r"><img class="media-img" src="__PUBLIC__'+data['item_list'][i]['cover']+'"></div>';
                                html += '</li>';
                            }
                        }
                        html += '</ul>';
                    }
                    html += '</div>';
                }
                var type = $("#type").val();
                $("#type"+type+" .step_0").hide();
                $("#type"+type+" .step_1").show();
                $("#type"+type+" .step_1 .reply-div").remove();
                $("#type"+type+" .step_1 .media-button").before(html);
                if(type == 1){
                    addOrUpdateFollowReply(media_id);
                }else if(type == 3){
                    addOrUpdateDefaultReply(media_id);
                }
            }
        })
    }
    /**
     * 添加 或 修改 默认回复
     */
    function addOrUpdateDefaultReply(media_id){
        var id = $("#id").val();
        var type = $("#type").val();
        $.ajax({
            url : "<?php echo url('addorupdatedefaultreply'); ?>",
            type : "post",
            async : true,
            data : { "media_id" : media_id, "id" : id },
            success : function(data){
                if(data.code > 0){
                    $('#id').val(data.code);
                    layer.alert(data.msg);
                }else{
                    layer.alert(data.msg,{icon:2});
                }
            }
        })
    }
    /**
     * 删除 回复
     */
    function delReply(){
        var type = $("#type").val();
        $.ajax({
            url : "<?php echo url('delreply'); ?>",
            type : "post",
            async : true,
            data : { "type" : type},
            success : function(data){
                if(data['code'] > 0){
                    layer.alert(data.msg,function(index){
                        window.location.href = data.url;
                    });
                }else{
                    layer.alert(data.msg,{time:1000,icon:2});
                }
            }
        })
    }
</script>
</body>
</html>