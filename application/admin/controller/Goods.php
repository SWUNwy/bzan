<?php
namespace app\admin\controller;

use think\Controller;

class Goods extends Controller {

	public function index() {
		return $this->fetch();
	}
	
}