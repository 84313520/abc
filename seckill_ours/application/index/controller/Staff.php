<?php
/**
 * Created by PhpStorm.
 * User: wjj
 * Date: 2017/12/22
 * Time: 14:58
 */
namespace app\index\controller;
use \think\Controller;
use \think\Db;   //---不需要model文件，直接调用
use \think\Cache;//使用tp框架的缓存类
class Staff extends Controller
{
    public function staff(){
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