<?php
namespace app\index\controller;
use think\Controller;
/**
 * IndexController
 * 商城首页模块
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class Index extends Controller {
	
    public function index() {
        return $this->fetch();
    }
}
