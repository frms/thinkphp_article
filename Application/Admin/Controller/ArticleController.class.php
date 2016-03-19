<?php
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends BaseController {
	public function add() {
		$this->display('add');
		echo "string";
	}

	public function addArticle() {
		echo "string";
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