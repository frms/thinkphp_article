<?php
namespace Home\Controller;
use Think\Controller;

class ArticleController extends Controller {
	public function index() {

		$type = D('type');
		$type = $type->select();
		$this->assign('type', $type);

		$article = D('article');
		$article = $article->where('new=1')->limit(10)->select();
		$this->assign('article', $article);

		$this->display('article');

	}

}
