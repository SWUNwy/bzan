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
namespace app\admin\model;

use think\Model;
use think\Db;

class brandModel extends Model {

	protected $table = 'brand';

	
	public function brandList() {
		$db = Db::name($this->table);
		$list = $db->select();
		if ($list) {
			return $list;
		} else {
			return false;
		}
	}



	public function brandInfoAdd($data){
    	$validate = validate('Brand');
        if (!$validate->check($data)) {
        	return ['error'=>$validate->getError()]
        }
	    $db = Db::name($this->table);
	    $result = $db->insert($data,false,true);
	    if ($result) {
	    	return $result;
	    } else {
	    	return false;
	    }
	}


}