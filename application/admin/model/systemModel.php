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

class systemModel extends Model {

	protected $table = 'system';

	/**
	 * [systemInfo description]
	 * @return [type] [description]
	 */
	public function systemInfo() {
		$db = Db::name($this->table);
		$data = $db->find();
		return $data;  
	}
	/**
	 * [updateInfo description] 更新系统数据
	 * @param  [type]  array   $data   [description]  需要更新的数据
	 * @return [type]  boolean $result [description]  返回更新操作的结果
	 */
	/**
	 * [updateInfo description]	更新系统数据
	 * @param  [type]  array   $data   [description]  需要更新的数据
	 * @param  [type]  int 	   $id     [description]  更新数据的主键
	 * @return [type]  boolean $result [description]  返回更新操作的结果
	 */
	public function updateInfo($data,$id) {
		$db = Db::name($this->table);
		$result = $db->where('id',$id)->update($data);
		return $result;
	}

}