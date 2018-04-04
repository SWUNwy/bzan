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
	    $data = $data->systemInfo();
	    $this->assign('data',$data);
	   	return $this->fetch();
	}

	public function updateInfo() {
		$file = request()->file('icon_path');
		if (empty($file)) {
			$this->error('请选择上传文件!');
		}
		$path = ROOT_PATH . 'public' . DS .'admin/uploads/system';
		$icon_info = $file->validate(['size'=>10485760,'ext'=>'jpg,png,gif,jpeg'])->move($path);
		if ($icon_info) {
            // 成功上传后 获取上传信息
            $date_path = date('Ymd');
            $path = $date_path.'/'.$icon_info->getFileName();
		}else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
        $id = input('id');
		$data = [
			'title' 	=> input('title'),
			'meta' 		=> input('meta'),
			'keyword'	=> input('keyword'),
			'icp'		=> input('icp'),
			'copyright'	=> input('copyright'),
			'icon_path'	=> '__PUBLIC__/admin/uploads/system/'.$path,
			'last_time'	=> date('Y-m-d H:i:s'),
		];
		$systemModel = new systemModel();
		$result = $systemModel->updateInfo($data,$id);
		if ($result) {
			$this->success('更新成功!');
		} else {
			$this->error('更新失败!');
		}

	}

	public function log() {
		return $this->fetch();
	}

}