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
class orderModel extends Model {
	
	protected $order = 'order';

	/**
	 * 系统订单数据列表
	 * @return [type] [description]
	 */
	public function orderList() {
		$data = Db::name($this->order)->select();
		return $data;
	}

}