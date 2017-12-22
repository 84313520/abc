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
    //后台员管理-员工列表
    public function staff_list(){
        if(input('?get.select')){//搜索框
            $keyword=input('get.select');
            $staffList=Cache::get('good_'.$keyword);//缓存搜索值
            if(!$staffList){
                $staffList = Db::name("relative_staff_position")->alias('a')
                    ->join('staff w','a.sid = w.sid')
                    ->join('position c','a.pid = c.pid')
                    ->where(['state','normal'])
                    ->paginate(3,false,['query'=>request()->param()]);
                Cache::set('good_'.$keyword,$staffList,3600);
            }
        }else{
            $staffList = Db::name("relative_staff_position")->alias('a')
                ->join('staff w','a.sid = w.sid')
                ->join('position c','a.pid = c.pid')
                ->paginate(3,false,['query'=>request()->param()]);
        }
        $this->assign('staffList', $staffList);
        return $this->fetch();
    }
}