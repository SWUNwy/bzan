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
use app\admin\model\commonModel;
class Category extends Controller {

	private $table = 'category';

	public function index() {
		$table = $this->table;
		$dataList = new commonModel();
		$list = $dataList->tableList($table);
		$count = count($list);
		$this->assign('count',$count);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function categoryAdd() {
		return $this->fetch();
	}

	public function categoryEdit() {
		$id = input('id');
		$data = new categoryModel();
		$data = $data->categoryInfo($id);
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function categoryInfoAdd() {

		$data = [
			'category_name' => input('category_name'),
			'top' => input('top'),
			'status' => input('status'),
			'sort_id' => input('sort_id'),
			'parent_id' => input('parent_id'),
			'category_desc' => input('category_desc'),
			'create_time' => date('Y-m-d H:i:s'),
		];
		$infoAdd = new categoryModel();
		$result = $infoAdd->categoryInfoAdd($data);
		if ($result) {
		 	$this->success('操作成功!','category/index');
		 } else {
		 	$this->error('操作失败!');
		 }
	}

	public function categoryInfoEdit() {
		$id = input('category_id');
		$data = [
			'category_name' => input('category_name'),
			'top' => input('top'),
			'status' => input('status'),
			'sort_id' => input('sort_id'),
			'parent_id' => input('parent_id'),
			'category_desc' => input('category_desc'),
			'modified_time' => date('Y-m-d H:i:s'),
		];
		$infoEdit = new categoryModel();
		$result = $infoEdit->categoryInfoEdit($id,$data);
		if ($result) {
		 	$this->success('操作成功!','category/index');
		 } else {
		 	$this->error('操作失败!');
		 }				
	}

	public function categoryInfoDelete() {
		$id = input('id');
		$infoDelete = new categoryModel();
		$result = $infoDelete->categoryInfoDelete($id);
		if ($result) {
		 	$this->success('操作成功!','category/index');
		 } else {
		 	$this->error('操作失败!');
		 }	
	}


	public function categroyStatus() {
		$id = input('id');
		$status = input('status');
		// var_dump($status);
		// die();
		$status = new categoryModel();
		$result = $status->categroyStatus($id,$status);
		if ($result) {
			$this->success('操作成功!');
		} else {
			$this->error('操作失败!');
		}
	}

}