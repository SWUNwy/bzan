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
 * goodsModel
 * 会员管理模型
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-4-19)
 */
class goodsModel extends Model {
	
	protected $table = 'goods';

	/**
	 * [goods_list description]    商品数据列表
	 * @return [type] [description]    返回所有数据
	 */
	public function goodsList() {
		$data = Db::name($this->table)->select();
		return $data;
	}
}