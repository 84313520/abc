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

    //后台员管理-员工列表
    public function staffmgmt(){
        if(input('?get.input')){
            $input=input('get.input');//输入值
        }else{
            $input='';
        }
        if(input('?get.select') && input('get.select')!='全部'){//锁定
            $select=input('get.select');//使用、锁定
            //$staffList=Cache::get('good_'.$select);//缓存搜索值
            //if(!$staffList){
            $staffList = Db::name("staff_position")->alias('a')
                ->join('staff w','a.sid = w.sid')
                ->join('position c','a.pid = c.pid')
                ->where('state',$select)
                ->where('sname','like','%'.$input.'%')
                ->paginate(3,false,['query'=>request()->param()]);
            //Cache::set('good_'.$select,$staffList,3600);
            //}
        }else{
            $staffList = Db::name("staff_position")->alias('a')
                ->join('staff w','a.sid = w.sid')
                ->join('position c','a.pid = c.pid')
                ->where('sname','like','%'.$input.'%')
                ->paginate(3);
        }
        $this->assign('staffList', $staffList);
        return $this->fetch();
    }
    //后台员工管理-添加/修改员工资料
    public function addstaff(){
        //参数：添加或修改
        if(input('?get.sid')){
            $this->assign('sid',input('get.sid'));
            setcookie('sid',input('get.sid'));
        }else{
            $this->assign('sid','none');
            unset($_COOKIE['sid']);
        }
        return $this->fetch();
    }
    //后台订单管理-未支付订单
    public function unpaid(){
        return $this->fetch();
    }
    //后台订单管理-已支付订单
    public function paid(){
        return $this->fetch();
    }



}