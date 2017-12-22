<?php
/**
 * Created by PhpStorm.
 * User: 84313
 * Date: 2017/12/22
 * Time: 17:32
 */

namespace app\index\controller;

use think\Db;
use think\Loader;
Loader::import('MyCtrl', EXTEND_PATH,'.php');
class Other extends MyCtrl
{
    public function getMenu(){
//        $data = Db::name('')
    }
}