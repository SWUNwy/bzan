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
namespace app\admin\controller;

use think\Controller;
/**
 * 商品品牌管理
 */
class Brand extends Controller {

	public function index() {
		return $this->fetch();
	}

	/**
	 * [addBrand description]
	 * 添加品牌
	 */
	public function brand_add() {
		return $this->fetch();
	}
}
