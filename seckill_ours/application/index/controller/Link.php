<?php
/**
 * Created by PhpStorm.
 * User: 84313
 * Date: 2017/12/22
 * Time: 14:35
 */

namespace app\index\controller;
use think\Db;

use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
class Link extends MyCtrl
{
    public function login()
    {
        return $this->fetch();
    }
    //后台管理主界面(即登录进来的界面)
    public function main(){
        return $this->fetch();
    }

    //商品显示
    public function goodshow(){
        return $this->fetch();
    }
}