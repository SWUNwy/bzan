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
use app\index\model\UserModel;
use app\index\controller\Common;
use think\Request;
/**
 * UserController
 * 用户模块
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class User extends Common {

	/**
	 * 用户中心首页
	 * @return [type] [description]
	 */
	public function index() {
		$uid = session('uid');
		$userModel = new UserModel();
		$data = $userModel->userInfo($uid);
		$this->assign('data',$data);
		return $this->fetch();
	}


	/**
	 * 用户个人信息页面
	 * @return [type] [description]
	 */
	public function information() {
		$uid = session('uid');
		$userModel = new UserModel();
		$data = $userModel->userInfo($uid);
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function saveInfo() {
		$id = session('uid');
		$file = request()->file('images');
		if(!$file) {
			$request = Request::instance();
	        $data = [
	        	'nickname'	=> input('nickname'),
	        	'email'		=> input('email'),
	        	'last_ip'	=> $request->ip(),
	            'last_time' => date('Y-m-d H:i:s'),
	        ];
	        // var_dump($data);
	        $userModel = new UserModel();
	        $result = $userModel->saveInfo($id,$data);
	        if ($result) {
	         	$this->success('操作成功!','User/information');
	         } else {
	         	$this->error('操作失败!','User/information');
	         }
		} elseif ($file) {
			$path = ROOT_PATH . 'public' . DS .'index/uploads/user';
			$user_images = $file->validate(['size'=>10485760,'ext'=>'jpg,png,jpeg'])->move($path);
			if ($user_images) {
	            // 成功上传后 获取上传信息
	            $date_path = date('Ymd');
	            $images = $date_path.'/'.$user_images->getFileName();
			}else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }
	        $request = Request::instance();
	        $data = [
	        	'nickname'	=> input('nickname'),
	        	'email'		=> input('email'),
	        	'last_ip'	=> $request->ip(),
	            'last_time' => date('Y-m-d H:i:s'),
	            'images'	=> '__PUBLIC__/index/uploads/user/'.$images, 
	        ];
	        // var_dump($data);
	        $userModel = new UserModel();
	        $result = $userModel->saveInfo($id,$data);
	        if ($result) {
	         	$this->success('操作成功!','User/information');
	         } else {
	         	$this->error('操作失败!','User/information');
	         }
		}

	}

	/**
	 * 用户安全设置页面
	 * @return [type] [description]
	 */
	public function safety() {
		return $this->fetch();
	}

	/**
	 * 用户地址列表
	 * @return [type] [description]
	 */
	public function addressList() {
		return $this->fetch();
	}

	/**
	 * 用户中心订单列表
	 * @return [type] [description]
	 */
	public function orderList() {
		return $this->fetch();
	}

	/**
	 * 订单状态页面
	 * @return [type] [description]
	 */
	public function orderStatus() {
		return $this->fetch();
	}

	/**
	 * 用户订单详细信息
	 * @return [type] [description]
	 */
	public function orderInfo() {
		return $this->fetch();
	}

	/**
	 * 用户咨询建议页面
	 * @return [type] [description]
	 */
	public function suggest() {
		return $this->fetch();
	}

	/**
	 * 用户信息页面
	 * @return [type] [description]
	 */
	public function news() {
		return $this->fetch();
	}

	public function newsDetail() {
		return $this->fetch();
	}


}