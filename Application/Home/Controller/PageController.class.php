<?php
namespace Home\Controller;
use Think\Controller;

class PageController extends BaseController {
	public function index() {

		$id = I('name');
		$Form = M('page');
		$map['url'] = I('name');
		// 读取数据
		$data = $Form->where($map)->find();
		if ($data) {
			$this->assign('data', $data); // 模板变量赋值
		} else {
			$this->error('数据错误');
		}
		$this->assign('data', $data);
		$this->display('page');

	}

}
