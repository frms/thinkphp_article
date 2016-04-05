<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {
	public function __construct() {
		parent::__construct();
		$this->base();

	}
	public function base() {

		$config = M("config");
		$config = $config->where('id = 1')->find();
		$this->assign('config', $config);

		$page = M("page");
		$page = $page->where('isshow = 1')->select();
		$this->assign('pages', $page);

		$notice = M("notice");
		$notice = $notice->where('id = 1')->find();
		$this->assign('notice', $notice);

	}

}
