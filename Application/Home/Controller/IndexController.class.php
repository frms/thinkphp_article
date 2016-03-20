<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	public function index() {

		$type = M('type');
		$this->assign('type', $type);

		$this->display();

	}

}
