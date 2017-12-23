<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\AppServ\www\seckill_ours\public/../application/index\view\link\goodshow.html";i:1514013499;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品显示</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="nofollow"/>
    <link href="__STATIC__/css/goodshow.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu-list-right">
    <div class="page-title">
        <span class="modular fl"><i style="background:url('__STATIC__/img/admin_bg.png')-4px -44px;"></i><em>产品列表</em></span>
        <span class="modular fr"><a href="#" class="pt-link-btn">+添加商品</a></span>
    </div>
    <select class="inline-select" id="select1">
        <option>分类</option>
    </select>
    <select class="inline-select">
        <option>类型</option>
    </select>
    <select class="inline-select">
        <option>状态</option>
    </select>
    <input type="text" class="textBox length-long" placeholder="输入产品名称..."/>
    <input type="button" value="查询" class="tdBtn" id="search"/>
    <table class="list-style Interlaced">
        <tr>
            <th>ID编号</th>
            <th>名称</th>
            <th>简介</th>
            <th>图片</th>
            <th>市场价</th>
            <th>会员价</th>
            <th>商品类型</th>
            <th>商品状态</th>
            <th>库存</th>
            <th>操作</th>
        </tr>
        <tr>
            <td>
                 <span><i>0</i></span>
            </td>
            <td class="center pic-area"></td>
            <td class="td-name">
                <span class="ellipsis td-name block">111111111</span>
            </td>
            <td class="center pic-pic">
                <img src="">
            </td>
            <td class="center">
                 <span><i>￥</i><em>0.00</em></span>
            </td>
            <td class="center">
                 <span><i>￥</i><em>0.00</em></span>
            </td>
            <td class="center">
                 <span>秒杀</span>
            </td>
            <td class="center">
                <span>过期</span>
            </td>
            <td class="center">
                <span><em>589</em><i>件</i></span>
            </td>
            <td class="center">
                <input type="button" value="上架">
                <input type="button" value="下架">
                <input type="button" value="修改">
                <input type="button" value="删除">
            </td>
        </tr>
    </table>
</div>
</body>
</html>
<script src="__STATIC__/js/jquery.js"></script>
<script src="__STATIC__/js/goodshow.js"></script>