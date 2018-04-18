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
 * 商品模块控制器
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */

class Goods extends Controller {

	public function index() {}

	/**
	 * 商品搜索结果展示页
	 * @return [type] [description]
	 */
	public function goodsList() {
		return $this->fetch();
	}


}