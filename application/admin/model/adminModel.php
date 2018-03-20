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
namespace app\amdin\model;

use think\Model;
use think\Db;

class adminModel extends Model {

	protected $table = 'admin';

	public function adminAdd($data) {
		$db = Db::name($this->table);
		$result = $db->add($data);
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

}