<?php
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller {
	public function index() {
		$type = D('type');
		$type = $type->select();
		$this->assign('type', $type);
		$this->display();

	}

}
