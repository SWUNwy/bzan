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

class Index extends Controller {
    
    public function index() {
        return $this->fetch();
    }

    public function home() {
    	$data = [
    		'date' => date('Y-m-d H:i:s'),
    		'ip'   => request()->ip(),
    	];
    	$this->assign('data', $data);
    	return $this->fetch();
    }
}
