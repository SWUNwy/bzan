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
 * GoodsController
 * 购物车模块控制器
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */

class Cart extends Controller {

	public function userCart() {
		return $this->fetch();
	}

}