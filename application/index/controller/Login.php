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
use think\Request;
/**
 * IoginController
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

        $uname = input('uname');
        $pwd  = MD5(input('password'));
        $user = Db::name('user')
                    ->where('uname|phone|email','eq',$uname)
                    ->find();
        if (!$user || $user['pwd'] != $pwd) {
            $this->error('用户名或密码错误!','Login/index');
        } elseif ($user['state'] == 0) {
            $this->error('当前用户暂未激活，请稍后再试!','Index/index');
        } else {
            $request = Request::instance();
            $data = [
                'last_ip' => $request->ip(),
                'last_time' => date('Y-m-d H:i:s'),
            ];
            $result = Db::name('user')->where('uid='.$user['uid'])->update($data);
            //设置session
            session('uid',$user['uid']);
            session('uname',$user['uname']);

            $this->success('登录成功!','User/index');
        }

        

    }

}