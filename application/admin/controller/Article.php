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
namespace app\admin\controller;

use think\Controller;
/**
 * 文章处理控制器
 * 
 */
class Article extends Controller {

	public function index() {
		return $this->fetch();
	}

	public function category() {
		return $this->fetch();
	}

	public function article_add() {
		return $this->fetch();
	}



}