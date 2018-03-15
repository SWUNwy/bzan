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
	 * [sysInfo description]
	 * @return [type] [description]
	 */
	public function sysInfo() {
		$db = Db::name($this->table);
		$data = $db->find();
		return $data;  
	}

}