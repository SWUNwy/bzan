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
use app\admin\model\Common;
/**
 * 商品品牌管理
 */
class Brand extends Controller {

	protected $brand = 'brand';

	public function index() {
		return $this->fetch();
	}

	/**
	 * [addBrand description]
	 * 添加品牌
	 */
	public function brandAdd() {
		return $this->fetch();
	}

	/**
	 * [brand_detail description]
	 * @return [type] [description]
	 */
	public function brandAetail() {
		return $this->fetch();
	}

	public function delete() {}

}
