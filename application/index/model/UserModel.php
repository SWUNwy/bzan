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
namespace app\index\model;

use think\Model;
use think\Db;
/**
 * UserModel
 * 用户模型
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-4-19)
 */
class UserModel extends Model {

	protected $table = ('user');

	/**
	 * 用户信息数据查询
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function userInfo($id) {
		$data = Db::name($this->table)
				->where('uid='.$id)
				->find();
		return $data;
	}

}
