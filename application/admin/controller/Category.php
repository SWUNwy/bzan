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
use app\admin\model\categoryModel;

class Category extends Controller {

	public function index() {
		$dataList = new categoryModel();
		$list = $dataList->categoryList();
		var_dump($list);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function categoryAdd() {
		return $this->fetch();
	}
}