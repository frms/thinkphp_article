<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends BaseController {
	public function index() {
		$this->display('index');
	}

	public function head() {
		$this->display('head');
	}

	public function left() {
		$this->display('left');

	}
	public function right() {
		$this->display('right');
	}
}