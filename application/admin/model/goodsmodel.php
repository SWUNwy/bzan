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

class GoodsModel extends Model {
	
	protected $table = 'goods';

	/**
	 * [goods_list description]
	 * @return [type] [description]
	 */
	public function goods_list() {
		$arr = Db::name($this->table)->select();
		return $arr;
	}
}