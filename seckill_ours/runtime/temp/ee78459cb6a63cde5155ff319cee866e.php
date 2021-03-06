<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\AppServ\www\seckill_ours\public/../application/index\view\link\main.html";i:1514016391;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理主界面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="nofollow"/>
    <link href="__STATIC__/css/adminStyle.css" rel="stylesheet" type="text/css">
    <script src="__JS__/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<style>
    [v-cloak]{
        display: none;
    }
</style>
<body>
<div class="header">
    <div class="logo" style="background:url('__STATIC__/img/admin_logo.png');height: 75px;width: 140px">
    </div>
    <div class="fr top-link">
        <a href="#" target="_blank" title="访问站点"><i style="background:url('__STATIC__/img/admin_bg.png') -5px -9px"></i><span>访问站点</span></a>
        <a href="admin_list.html" target="mainCont" title="DeathGhost"><i style="background:url('__STATIC__/img/admin_bg.png') -37px -9px;"></i><span><?php echo \think\Session::get('admininfo')['pname']; ?>：<?php echo \think\Session::get('admininfo')['sid']; ?></span></a>
        <a href="#" title="修改密码"><i style="background:url('__STATIC__/img/admin_bg.png') -70px -9px;"></i><span>清除缓存</span></a>
        <a href="revise_password.html" target="mainCont" title="修改密码"><i style="background:url('__STATIC__/img/admin_bg.png') -104px -9px;"></i><span>修改密码</span></a>
        <a href="<?php echo url('index/Login/logout'); ?>" title="安全退出" style="background:rgb(60,60,60);"><i style="background:url('__STATIC__/img/admin_bg.png') -135px -6px;"></i><span>安全退出</span></a>
    </div>
</div>
<div id="content">
    <!--菜单列表-->
    <div class="menu-list-left">
        <div class="menu-list" id="menu">
            <a href="#" target="mainCont" class="block menu-list-title center" style="border:none;margin-bottom:8px;color:#fff;">起始页</a>
            <ul id="menu_ul" v-for="item in menuArr" v-cloak>
                <li v-if="item.id==0" class="menu-list-title">
                    <span>{{item.opname}}</span>
                    <i>◢</i>
                </li>
                <li v-if="item.id==0">
                    <ul v-for="item1 in menuArr" class="menu-children">
                        <li :href="item1.url" v-if="item1.id == item.opid">{{item1.opname}}</li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--iframe-->
    <div class="menu-list-right" >
        <iframe style="width: 100%;height: 100%;" id="iframe1" src="" frameborder="0"></iframe>
    </div>
</div>

</body>
</html>
<script>
    var menuUrl="<?php echo url('index/Other/getMenu'); ?>";
</script>
<script src="__JS__/main.js"></script>
