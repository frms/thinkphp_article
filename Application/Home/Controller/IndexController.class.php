<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends BaseController {
	public function index() {

		$article = D('article');
		$count = $article->where('isshow=1')->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 6); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev', 'Pre');
		$Page->setConfig('next', 'Next');
		$Page->setConfig('header', 'Total %TOTAL_ROW% Record');
		$Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% Page</a></ul>");
		$show = $Page->show(); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $article->order('id desc')->where('isshow=1')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$this->assign('list', $list); // 赋值数据集
		$this->assign('page', $show); // 赋值分页输出
		$this->display('index');

	}

}
