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
 * userModel
 * 会员管理模型
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */

class userModel extends Model {
	
	protected $user = 'user';

	/**
	 * 获取所有会员数据
	 * @return [type] [description]
	 */
	public function userList() {
		$data = Db::name($this->user)->select();
		return $data; 
	}


	public function userInfo($uid='') {
		$data = Db::name($this->user)
					->where('uid='.$uid)
					->find();
		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

	public function userAdd() {}

}