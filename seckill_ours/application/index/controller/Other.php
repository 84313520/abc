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
    public function getMenu($sid = 'root'){
        $data = Db::name('staff')->alias('s')
            ->join('staff_position sp','sp.sid = s.sid')
            ->join('position p','sp.pid = p.pid')
            ->join('right r','p.pid = r.pid')
            ->join('operation op','r.opid = op.opid')->where(['s.sid'=>$sid])->select();
        foreach ($data as $key=>$item) {
            if(!empty($item['url'])){
                $data[$key]['url'] = url($item['url']);
            }
        }
        return $this->newRes('107',$data);
    }
}