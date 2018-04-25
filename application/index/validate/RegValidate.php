<?php
// +----------------------------------------------------------------------
// | bzan
// +----------------------------------------------------------------------
// | Copyright (c) 2018~2022  All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: wyecho <@sina.com>
// +----------------------------------------------------------------------\
namespace app\index\validate;

use think\Validate;

class RegValidate extends Validate {

	/**
	 * [$rules description] 验证条件
	 * @var [type]
	 */
	protected $rule = [
		'phone' => 'require|min:11|max:11',
		'uname' => 'require|min:2',
		'pwd' => 'require',
	];

	/**
	 * [$message description]  验证规则
	 * @var [type]
	 */
	protected $message = [
		'phone.require'	=> '电话号码必填',
		'phone.min'		=> '电话号码不能少于11位',
		'phone.max'		=> '电话号码不能超过11位',
		'uname.require' => '用户名必填',
		'uname.min'	 	=> '用户名不能少于两个字',
		'pwd'		=> '密码必填',
	];	

}