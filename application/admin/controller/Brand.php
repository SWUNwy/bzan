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
use think\Image;
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
	public function brandEdit() {
		return $this->fetch();
	}

	public function brandInfoAdd() {
		$file = request()->file('path');
		if (empty($file)) {
			$this->error('请选择上传文件!');
		}
		$path = ROOT_PATH . 'public' . DS .'admin/uploads/brand';
		$brand_log = $file->validate(['size'=>10485760,'ext'=>'jpg,png,jpeg'])->move($path);
		if ($brand_log) {
            // 成功上传后 获取上传信息
            $date_path = date('Ymd');
            $log = $date_path.'/'.$brand_log->getFileName();
		}else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
		$data = [
			'brand_name' => input('brand_name'),
			'path'  	 => '__PUBLIC__/admin/uploads/brand/'.$log,
			'place' 	 => input('place'),
			'status' 	 => input('status'),
			'sort_id' 	 => input('sort_id'),
			'desc' 		 => input('desc'),
			'add_time'   => date('Y-m-d H:i:s'),
		];
		$addInfo = new brandModel();
		$result = $addInfo->brandInfoAdd($data);
		if ($result) {
			$this->success('上传成功!','brand/index');
		} else {
			$this->error('上传失败!');
		}
	}

	public function infoDelete() {
		$id = input('id');
		$delete = new brandModel();
		$result = $delete->infoDelete($id);
		if ($result) {
			$this->success('删除成功!');
		} else {
			$this->error('删除失败!');
		}
	}

}
