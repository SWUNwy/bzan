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
/**
 * 公用模型类
 */
class commonModel extends Model {

	/**
	 * [tableList description]    获取数据列表
	 * @param  [type] $table [description]    指定的表
	 * @return [type]        [description]    返回数据
	 */
	public function tableList($table) {
		$db = Db::name($table);
		$list = $db->select();
		if ($list) {
			return $list;
		} else {
			return false;
		}
	}

	public function dataInfo($id,$table) {
		$db = Db::name($table);
	}

}
