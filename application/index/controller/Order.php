<?php
// +----------------------------------------------------------------------
// | bzan
// +----------------------------------------------------------------------
// | Copyright (c) 2018~2022  All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: wyecho <@sina.com>
// +----------------------------------------------------------------------
namespace app\index\controller;

use think\Controller;
/**
 * OrderController
 * 订单处理模块
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class Order extends Controller {

    public function index() {}

    /**
     * 用户订单支付成功跳转页面
     * @return [type] [description]
     */
    public function orderSuccess() {
        return $this->fetch();
    }
    

}