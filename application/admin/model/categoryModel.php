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
namespace app\admin\model;

use think\Model;
use think\Db;

class categoryModel extends Model {

	protected $table = 'category';

	/**
	 * [categoryList description]    产品分类列表
	 * @return [type] [description]
	 */
	public function categoryList() {

		$data = Db::name($this->table)->select();
		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

	/**
	 * [categoryInfo description]   获取指定分类数据
	 * @param  [type] $id [description]   指定数据Id
	 * @return [type]     [description]   返回查询结果
	 */
	public function categoryInfo($id) {
		$data = Db::name($this->table)
				->where('category_id='.$id)
				->find();
		if ($data) {
			return $data;
		} else {
			return false;
		}		
	}

	public function categoryInfoAdd($data) {
		$db = Db::name($this->table);
		$result = $db->insert($data);
	    if ($result) {
	    	return true;
	    } else {
	    	return false;
	    }
	}

	/**
	 * [categorySave description]    分类数据保存:新增/编辑
	 * @param  [type] $id   [description]    分类id
	 * @param  [type] $data [description]    需要操作的数据
	 * @return [type]       [description]    返回操作结果
	 */
	public function categoryInfoEdit($id,$data) {
		$db = Db::name($this->table);
		$result = $db
				  ->where('category_id='.$id)
				  ->update($data);
	    if ($result) {
	    	return true;
	    } else {
	    	return false;
	    }

	}

	/**
	 * [categoryInfoDelete description]    分类信息删除
	 * @param  [type] $id [description]    指定分类信息id
	 * @return [type]     [description]    操作结果
	 */
	public function categoryInfoDelete($id) {
		$db = Db::name($this->table);
		$result = $db
				  ->where('category_id='.$id)
				  ->delete();
		if ($result) {
			return $result;
		} else {
			return false;
		}		
	}


	/**
	 * [categroyStatus description]    分类状态 是否显示
	 * @param  [type] $id     [description]    指定id
	 * @param  [type] $status [description]    更改数据
	 * @return [type]         [description]    操作结果
	 */
	public function categroyStatus($id,$status) {
		$db = Db::name($this->table);
		switch ($status) {
			case '1':
				$result = $db->where(['category_id'=>$id])
						 ->update(['status'=>0,'modified_time' => date('Y-m-d H:i:s'),]);
				return $result;
				break;
			case '0':
				$result = $db->where(['category_id'=>$id])
						 ->update(['status'=>1,'modified_time' => date('Y-m-d H:i:s')]);
				return $result;
				break;
			default:
			return false;
		}
	}

}