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

	public function categoryList() {

		$data = Db::name($this->table)->select();
		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

}