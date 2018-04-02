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
use app\admin\model\brandModel;
use app\admin\model\commonModel;
/**
 * 商品品牌管理
 */
class Brand extends Controller {

	protected $table = 'brand';

	public function index() {
		$table = $this->table;
		$dataList = new commonModel();
		$list = $dataList->tableList($table);
		$count = count($list);
		$this->assign('count',$count);
		$this->assign('list',$list);
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
	public function detail() {
		return $this->fetch();
	}

	public function brandInfoAdd() {
		echo "success";
	}

	public function delete() {}

}
