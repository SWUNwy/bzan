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

class brandModel extends Model {

	protected $table = 'brand';

	
	public function brandList() {
		$db = Db::name($this->table);
		$list = $db->select();
		if ($list) {
			return $list;
		} else {
			return false;
		}
	}



	public function brandInfoAdd($data){
	    $db = Db::name($this->table);
	    $result = $db->insert($data,false,true);
	    if ($result) {
	    	return $result;
	    } else {
	    	return false;
	    }
	}

	/**
	 * [infoDelete description]    删除指定品牌数据
	 * @param  [type] int     $id [description]    品牌id
	 * @return [type] boolean $result   [description]    返回操作结果
	 */
	public function infoDelete($id) {
		$db = Db::name($this->table);
		$result = $db
				  ->where('brand_id='.$id)
				  ->delete();
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * [infoEdit description]    编辑品牌信息
	 * @param  [type] $id   [description]    指定id
	 * @return [type]       [description]    返回操作结果
	 */
	public function infoEdit($id) {
		$db = Db::name($this->table);
		$result = $db->find($id);
		if ($result) {
			return $result;
		} else {
			return false;
		}		
	}

	public function brandInfoEdit($id,$data) {
		$db = Db::name($this->table);
		$result = $db
				  ->where('brand_id='.$id)
				  ->update($data);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * [brandStatus description]    品牌状态设置
	 * @param  [type] $id     [description]    品牌id
	 * @param  [type] $status [description]    品牌现有状态
	 * @return [type]         [description]    返回操作结果
	 */
	public function brandStatus($id,$status) {
		$db = Db::name($this->table);
		switch ($status) {
			case '1':
			$result = $db->where(['brand_id'=>$id])
						 ->update(['status'=>0,'last_time' => date('Y-m-d H:i;s'),]);
				return $result;
				break;
			case '0':
			$result = $db->where(['brand_id'=>$id])
						 ->update(['status'=>1,'last_time' => date('Y-m-d H:i;s'),]);
				return $result;
				break;
			default:
			return false;
		}
	}

}