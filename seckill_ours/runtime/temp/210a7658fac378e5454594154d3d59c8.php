<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\AppServ\www\abc\seckill_ours\public/../application/index\view\link\addstaff.html";i:1514037569;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加用户</title>
    <script src="view/js/angular.js"></script>
    <script src="view/js/jquery-1.12.3.min.js"></script>
    <style>
        body {
            padding: 20px;
        }
        .req {
            color: red;
        }
        input[name="act"]{
            border:none;
            font-size: 16px;
            background-color: inherit;
            font-weight: bold;
            height: 36px;
        }
        #title {
            font-size: 16px;
            font-weight: bold;
            height: 36px;
            margin-left: 18px;
            line-height: 36px;
        }
        .t1 {
            width: 200px;
            text-align: right;
            font-size: 16px;
            line-height: 30px;
        }
        .t2 input {
            width: 260px;
            height: 26px;
            border-radius: 3px;
            border: 1px solid gainsboro;
        }
        select {
            width: 160px;
            height: 26px;
            border: 1px solid gainsboro;
        }
    </style>
</head>
<body>
<div id="cover">
    <div id="addStaff">
        <form ng-app="myApp" name="myForm" ng-controller="formCtrl" novalidate method="post"
              action="index.php?c=Staff&a=add" enctype="multipart/form-data">
            <p id="title">当前位置：系统管理/员工管理/<input name="act" ng-if="action=='add'" value="添加员工" readonly>
            <input name="act" ng-if="action=='update'" value="修改员工信息" readonly></p>
            <table>
                <tr>
                    <td class="t1">账号：</td>
                    <td  class="t2">
                        <input ng-if="action=='add'" type="text" ng-model="id" name="id"
                               ng-minlenght="5" ng-maxlenght="26" required>
                        <input ng-if="action=='update'" type="text" ng-model="id" name="id"
                               ng-minlenght="5" ng-maxlenght="26" readonly>
                    </td>
                    <td class="t3">
                        <span ng-show="myForm.id.$dirty && myForm.id.$invalid">
                            <span ng-show="myForm.id.$error.required">账号不能为空！</span>
                            <span ng-show="myForm.id.$error.minlenght">账号不能小于5位！</span>
                            <span ng-show="myForm.id.$error.maxlenght">账号不能大于26位！</span>
                        </span>
                        <span ng-show="myForm.id.$pristine">
                            <span  class="req" ng-show="myForm.id.$error.required">*</span>
                        </span>
                    </td>

                </tr>
                <tr>
                    <td class="t1">姓名：</td>
                    <td class="t2"><input type="text" ng-model="name" name="name" required ng-pattern="/^[\u4e00-\u9fa5]{0,}$/"></td>
                    <td class="t3">
                        <span ng-show="myForm.name.$dirty && myForm.name.$invalid">
                            <span ng-show="myForm.name.$error.required">姓名不能为空！</span>
                            <span ng-show="myForm.name.$error.pattern">姓名为汉字！</span>
                        </span>
                        <span ng-show="myForm.name.$pristine">
                            <span  class="req" ng-show="myForm.name.$error.required">*</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="t1">设置密码：</td>
                    <td class="t2"><input type="password" ng-model="pwd" name="pwd" required></td>
                    <td class="t3">
                        <span ng-show="myForm.pwd.$dirty && myForm.pwd.$invalid">
                            <span ng-show="myForm.pwd.$error.required">密码不能为空！</span>
                        </span>
                        <span ng-show="myForm.pwd.$pristine">
                            <span class="req" ng-show="myForm.pwd.$error.required">*</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="t1">确认密码：</td>
                    <td class="t2"><input type="password" ng-model="pwd1" name="pwd1" ng-change="cmpPwd()" required></td>
                    <td class="t3">
                        <span ng-show="myForm.pwd1.$dirty && myForm.pwd1.$invalid">
                            <span ng-show="myForm.pwd1.$error.required">确认密码不能为空！</span>
                        </span>
                         <span ng-show="myForm.pwd1.$pristine">
                            <span class="req" ng-show="myForm.pwd1.$error.required">*</span>
                        </span>
                        <span ng-if="cmp">密码不一致！</span>
                    </td>
                </tr>
                <tr>
                    <td class="t1">职位：</td>
                    <td class="t2"><select name="position">
                            <option ng-repeat="item in posit" ng-if="item.pid!=staff.pid && item.pid!=1" value="{{item.pid}}">{{item.pname}}</option>
                            <option ng-repeat="item in posit" ng-if="item.pid==staff.pid" value="{{item.pid}}" selected>{{item.pname}}</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="t1">用户状态：</td>
                    <td class="t2">
                        <select name="state" ng-if="action=='add'">
                            <option>使用</option>
                            <option>锁定</option>
                        </select>
                        <select name="state" ng-if="action=='update'">
                            <option ng-if="state=='使用'" selected>使用</option>
                            <option ng-if="state=='使用'">锁定</option>
                            <option ng-if="state=='锁定'">使用</option>
                            <option ng-if="state=='锁定'" selected>锁定</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="t1"></td>
                    <td><input ng-if="action=='update'" type="submit" ng-disabled="myForm.id.$dirty && myForm.id.$invalid ||
                    myForm.name.$dirty && myForm.name.$invalid || cmp || myForm.pwd.$pristine || myForm.pwd1.$pristine ||
                    myForm.pwd1.$dirty && myForm.pwd1.$invalid">
                        <input ng-if="action=='add'" type="submit" ng-disabled="myForm.id.$dirty && myForm.id.$invalid ||
                    myForm.name.$dirty && myForm.name.$invalid || cmp || myForm.pwd.$pristine ||
                    myForm.name.$pristine || myForm.pwd1.$pristine || myForm.id.$pristine ||
                    myForm.pwd1.$dirty && myForm.pwd1.$invalid">
                        <input type="reset">
                        <a href="index.php?c=Staff&a=staManage">返回</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: wjj
 * Date: 2017/11/12
 * Time: 18:03
 */
?>
</body>
<script>
    var app=angular.module("myApp",[]);
    app.controller('formCtrl', function ($scope,$http) {
        $http({
            method:"post",
            url:"index.php?c=Staff&a=getPosition"
        }).then(function (res) {
            console.log(res.data);
            //console.log(res.data.staff);
            if(res.data.staff!=undefined){
                $scope.action='update';
                $scope.posit=res.data.position;
                $scope.staff=res.data.staff[0];
                $scope.id=res.data.staff[0].sid;
                $scope.name=res.data.staff[0].sname;
                $scope.state=res.data.staff[0].state;
                // $scope.=res.data.staff[0].sname;
            }
            else {
                $scope.action='add';
                $scope.posit=res.data;
                $scope.id='';
            }
        }, function (err) {
            console.log(err);
        });
        $scope.cmpPwd= function () {
            if($scope.pwd==$scope.pwd1) {
                $scope.cmp=false;
            }
            else {
                $scope.cmp=true;
            }
        }
    });
</script>
</html>