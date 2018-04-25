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
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\validate\RegValidate;
use app\index\model\commonModel;
/**
 * IndexController
 * 商城用户注册模块
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class Register extends Controller {

	public function index() {
		return $this->fetch();
	}

	/**
	 * 用户注册方法
	 * @return [type] [description]
	 */
	public function register() {
		$data = [
			'phone' => input('phone'),
			'uname' => input('uname'),
			'pwd'	=> MD5(input('password')),
			'add_time' => date('Y-m-d H:i:s'),
		];

		$validate = validate('RegValidate');

		if(!$validate->check($data)){
			$this->error($validate->getError(),'Register/index');
		}
		$phone = Db::name('user')
					->where('phone','eq',input('phone'))
					->find();
		if ($phone) {
			$this->error('该电话号码已被注册!','Register/index');
		}
		$uname = Db::name('user')
					->where('uname','eq',input('uname'))
					->find();
		if ($uname) {
			$this->error('该用户名已被使用!','Register/index');
		}

		$reg = new commonModel();
		$result = $reg->userReg($data);
		if ($result) {
			session('uid',$result);
			$this->success('注册成功!','User/index');
		} else {
			$this->error('注册失败!','Register/index');
		}
		
	}

}