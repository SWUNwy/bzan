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
use app\index\model\userModel;
use app\index\controller\Common;
use think\Request;
use think\Db;
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
		$userModel = new userModel();
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
		$userModel = new userModel();
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
	        $userModel = new userModel();
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
	        $userModel = new userModel();
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
	 * 修改密码
	 * @return [type] [description]
	 */
	public function pwdEdit() {
		return $this->fetch();
	}

	/**
	 * 用户密码修改
	 * @return [type] [description]
	 */
	public function pwdSave() {
		$id = input('uid');
		$userModel = new userModel();
		$userInfo = $userModel->userInfo($id);
		$oldPwd = Md5(input('oldPwd'));
		$newPwd = Md5(input('newPwd'));
		if ($oldPwd != $userInfo['pwd'] ) {
			$this->error('原密码输入有误');
		} elseif ($newPwd === $userInfo['pwd']) {
			$this->error('新设置密码不能与原密码重复');
		} else {
			$result = $userModel->pwdSave($id,$newPwd);
	        if ($result) {
	         	$this->success('操作成功!','User/index');
	         } else {
	         	$this->error('操作失败!','User/index');
	         }
		}
		
	}

	/**
	 * 用户地址列表
	 * @return [type] [description]
	 */
	public function addressList() {

		$uid = session('uid');

		$userModel = new userModel();
		$data = $userModel->address();
		$addList = $userModel->userAddressList($uid);
	    $this->assign('data',$data);
		return $this->fetch();
	}

	/**
	 * 获取数据表中地址数据
	 * @return [type] [description]
	 */
	public function getRegion(){
	    $Region=Db::name("address");
	    $map['pid']=$_REQUEST["pid"];
	    $map['type']=$_REQUEST["type"];
	    $list=$Region->where($map)->select();
	    echo json_encode($list);
	}

	/**
	 * 新增收货地址
	 * @return [type] [description]
	 */
	public function addressAdd() {
		$userModel = new userModel();
		$data = $userModel->address();
	    $this->assign('data',$data);
	    return $this->fetch();
	}


	public function addressEdit() {
		$userModel = new userModel();
		$data = $userModel->address();
	    $this->assign('data',$data);
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


	/**
	 * 身份验证
	 * @return [type] [description]
	 */
	public function idcard() {
		return $this->fetch();
	}

	/**
	 * 保存用户真实身份信息
	 * @return [type] [description]
	 */
	public function saveRname() {
		$id = input('uid');
		$data = [
			'rname' => input('rname'),
			'idcard' => input('idcard'),
		];
		$userModel = new userModel();
		$result = $userModel->saveRname($id,$data);
        if ($result) {
         	$this->success('操作成功!','User/index');
         } else {
         	$this->error('操作失败!','User/index');
         }
	}



}