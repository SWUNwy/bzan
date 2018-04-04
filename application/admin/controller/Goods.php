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
use think\View;
use app\admin\model\goodsModel;
use app\admin\model\commonModel;

class Goods extends Controller {
	
	public function goodsList() {
		$goodsmodel = new goodsModel();
		$data = $goodsmodel->goodsList();
		$count = count($data);
		$this->assign('count',$count);
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function goodsAdd() {
		return $this->fetch();
	}
}