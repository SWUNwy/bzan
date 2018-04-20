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
/**
 * IndexController
 * 商城用户登录模块
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class Login extends Controller {
	
    public function index() {
        return $this->fetch();
    }

    /**
     * 用户登录
     * @return [type] [description]
     */
    public function login() {
    	$code = input('code');
    	$captcha = new \think\captcha\Captcha();
    	$result=$captcha->check($code);  
        if($result===false){  
            $this->error('验证码错误!','Login/index');  
        } 

        $user = input('user');
        

    }

}