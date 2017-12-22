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

    public function test(){
        $str = '$2y$10$4kAu4FNGuolmRmSSHgKEMe3DbG5pm3diikFkiAKNh.Sf1tPbB4uo2';
        var_dump(strlen($str));
    }
}