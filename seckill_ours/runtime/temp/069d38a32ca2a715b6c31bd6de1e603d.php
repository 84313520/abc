<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\AppServ\www\seckill_ours\public/../application/index\view\staff\staff.html";i:1513949407;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>员工管理</title>
    <link href="__STATIC__/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="__STATIC__/js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/bootstrap.min.js"></script>
</head>
<body style="padding: 20px">
<div>当前位置：/系统管理/员工管理</div>
<div>
    <button class="btn btn-warning">+添加</button>
    <button class="btn btn-warning">使用</button>
    <button class="btn btn-warning">锁定</button>
    <span>用户状态：</span>
    <select>
        <option>全部</option>
        <option>使用</option>
        <option>锁定</option>
    </select>
    <table>
        <tr>
        <td><input type="checkbox"></td>
        <td>账户</td>
        <td>用户名称</td>
        <td>用户职位</td>
        <td>用户状态</td>
        <td>操作</td>
        </tr>
        <?php if(is_array($staffList) || $staffList instanceof \think\Collection || $staffList instanceof \think\Paginator): $i = 0; $__LIST__ = $staffList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$staff): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><input type="checkbox"></td>
            <td>
                <?php echo $staff['sid']; ?>
            </td>
            <td>
                <?php echo $staff['sname']; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="text-center">
        <?php echo $staffList->render(); ?>
    </div>
</div>
</body>
<script type="text/javascript" src="__STATIC__/js/staff.js"></script>
</html>