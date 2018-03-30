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

class adminModel extends Model {

	protected $table = 'admin';

	public function adminList() {
		$db = Db::name($this->table);
		$list = $db->select();
		if ($list) {
			return $list;
		} else {
			return false;
		}
	}

	/**
	 * [adminAdd description]    新增管理员数据
	 * @param  [type] $data [description]    新增数据内容
	 * @return [type]       [description]    返回操作结果
	 */
	public function adminAdd($data) {
		$db = Db::name($this->table);
		$result = $db->insert($data);
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

	/**
	 * [adminInfo description]    管理员详细信息查询
	 * @param  [type] $id [description]    查询Id
	 * @return [type]     [description]    返回查询结果
	 */
	public function adminInfo($id) {
		$db = Db::name($this->table);
		$data = $db->find($id);
		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

	/**
	 * [adminDelete description]    删除管理员
	 * @param  [type] $id [description]    管理员id
	 * @return [type]     [description]    操作结果
	 */
	public function adminDelete($id) {
		$db = Db::name($this->table);
		$result = $db->delete($id);
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}


	/**
	 * [adminStatus description]    管理员状态设置
	 * @param  [type] $id   [description]    管理员id
	 * @param  [type] $data [description]    管理员现状态
	 * @return [type]       [description]    返回操作结果
	 */
	public function adminStatus($id,$data) {
		$db = Db::name($this->table);
		switch ($data) {
			case '1':
			$result = $db->where(['id'=>$id])
						 ->update(['status'=>0,'last_time' => date('Y-m-d H:i;s'),]);
				return $result;
				break;
			case '0':
			$result = $db->where(['id'=>$id])
						 ->update(['status'=>1,'last_time' => date('Y-m-d H:i;s'),]);
				return $result;
				break;
			default:
			return false;
		}

	}


}