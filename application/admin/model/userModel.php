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

	/**
	 * 会员详细信息
	 * @param  string $uid [description]
	 * @return [type]      [description]
	 */
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


	/**
	 * 会员状态操作
	 * @param  [type] $id    会员id
	 * @param  [type] $state 会员状态
	 * @return [type]        返回操作结果
	 */
	public function userState($id,$state) {
		$db = Db::name($this->user);
		switch ($state) {
			case '1':
			$result = $db->where(['uid'=>$id])
						 ->update(['state'=>0]);
				return $result;
				break;
			case '0':
			$result = $db->where(['uid'=>$id])
						 ->update(['state'=>1]);
				return $result;
				break;
			default:
			return false;
		}
	}


	/**
	 * 删除会员
	 * @param  [type] $id 会员id
	 * @return [type]     返回操作结果
	 */
	public function userDelete($id) {
		$result = Db::name('user')
					->where('uid='.$id)
					->delete();
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}



}