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
class userModel extends Model {

	protected $user = ('user');

	/**
	 * 用户信息数据查询
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function userInfo($id) {
		$data = Db::name($this->user)
				->where('uid='.$id)
				->find();
		return $data;
	}

	/**
	 * 会员信息保存模型
	 * @param  string $id   [description]
	 * @param  string $data [description]
	 * @return [type]       [description]
	 */
	public function saveInfo($id='',$data='') {
		$result = Db::name($this->user)
					->where('uid='.$id)
					->update($data);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 用户修改密码
	 * @param  [type] $id   [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function pwdSave($id,$data) {
		$result = Db::name($this->user)
					->where('uid='.$id)
					->setField('pwd',$data);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

}