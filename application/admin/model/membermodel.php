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
 * MemberModel
 * 会员管理模型
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */

class MemberModel extends Model {
	
	protected $user = 'user';

	/**
	 * 获取所有会员数据
	 * @return [type] [description]
	 */
	public function memberList() {
		$data = Db::name($this->user)->select();
		return $data; 
	}


	public function memberInfo($uid='') {
		$data = Db::name($this->user)
					->where('uid='.$uid)
					->find();
		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

}