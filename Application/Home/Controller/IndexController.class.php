<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	public function index() {

		$type = D('type');
		$type = $type->select();
		$this->assign('type', $type);

		$article = D('article');
		$article = $article->where('new=1')->limit(10)->select();
		$this->assign('article', $article);

		$User = D('article'); // 实例化User对象
		$count = $User->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 2); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$show = $Page->show(); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('id asc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$this->assign('list', $list); // 赋值数据集
		$this->assign('page', $show); // 赋值分页输出
		$this->display('');

		//$this->display();

	}

}
