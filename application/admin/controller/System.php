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
use think\Image;
use app\admin\model\systemModel;
/**
 * 系统控制器
 */
class System extends Controller {

	/**
	 * index
	 */
	public function index(){
	    $data = new systemModel();
	    $data = $data->sysInfo();
	    $this->assign('data',$data);
	   	return $this->fetch();
	}

	public function saveInfo() {
		$file = request()->file('icon_url');
		$path = ROOT_PATH . 'public' . DS .'admin/uploads/system';
		$icon_info = $file->validate(['size'=>2048000,'ext'=>'jpg,png,gif'])->move($path);
		if ($icon_info) {
            // 成功上传后 获取上传信息
            $icon_url = $icon_info->getSaveName();
		}else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
		$sys_info = [
			'title' 	=> input('title'),
			'meta' 		=> input('meta'),
			'keyword'	=> input('keyword'),
			'icp'		=> input('icp'),
			'Copyright'	=> input('copyright'),
			'icon_url'	=> $icon_url,
		];
		$sys_info = new systemModel();
		$result = $sys_info->sysInfoSave();
	}

	public function log() {
		return $this->fetch();
	}

}