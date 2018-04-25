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
 * CommonController
 * 公用Model
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-4-19)
 */

class commonModel extends Model {

	/**
	 * 用户注册
	 * @param  string $data [description]    用户注册信息数据
	 * @return [type]       [description]    返回用户注册成功后的uid
	 */
	public function userReg($data='') {
		$table = Db::name('user');
		$result = $table->insertGetId($data);
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}


}