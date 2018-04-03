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

namespace app\admin\validate;

use think\Validate;

class Brand extends Validate {

	/**
	 * [$rules description] 验证条件
	 * @var [type]
	 */
	protected $rule = [
		'brand_name' => 'require|min:2',
	];

	/**
	 * [$message description]  验证规则
	 * @var [type]
	 */
	protected $message = [
		'brand_name.require' => '品牌名必填'
		'brand_name.min'	 => '品牌名不能小于两个字',
	];

}