<?php
namespace app\index\controller;

use think\Controller;

use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
class Index extends MyCtrl
{
    //进入后台登录主页面

}
