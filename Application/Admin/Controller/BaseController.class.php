<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller {
	public function __construct() {
		parent::__construct();
		$this->checklogin();

	}

	public function checklogin() {
		if (!$_SESSION['admin']) {
			$this->error('请先登录！', U('Login/login'));
		} else {
			$this->assign('admin', session('admin'));
		}
	}

}