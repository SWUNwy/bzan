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

	/**
	 * 保存用户真实信息
	 * @param  [type] $id   [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function saveRname($id,$data) {
		$result = Db::name($this->user)
					->where('uid='.$id)
					->update([
						'real_name' => $data['rname'],
						'idcard' => $data['idcard'],
					]);
		if ($result) {
			return true;
		} else {
			return false;
		}		
	}

	/**
	 * 系统数据库所有地址数据
	 * @return [type] [description]
	 */
	public function address() {
		$data = Db::name('address')->where( 'pid = 1' )->select();
		return $data;		
	}


	/**
	 * 获取用户保存的地址数据信息
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function userAddressList($id) {
		$data = Db::name('user_address')
		            ->where('uid='.$id)
		            ->find();
		if ($data) {
			return $data;
		} else {
			return false;
		}
	}

	/**
	 * 用户新增收货地址
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function addressInfoAdd($data) {
		// $province_id = $data['province_id'];
		// $city_id = $data['city_id'];
		// $zone_id = $data['zone_id'];
		// $province = Db::name('address')->where('id='.$province_id)->value('name');
		// $city = Db::name('address')->where('id='.$city_id)->value('name');
		// $zone = Db::name('address')->where('id='.$zone_id)->value('name');
		// $data['province'] = $province;
		// $data['city'] = $city;
		// $data['zone'] = $zone;
		$result = Db::name('user_address')->insert($data);
		if ($result) {
			return true;
		} else {
			return false;
		}

	}

}
