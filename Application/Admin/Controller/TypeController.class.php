<?php
namespace Admin\Controller;
use Think\Controller;

class TypeController extends BaseController {
	public function index() {
		$this->display('index');
	}
	public function tianjia() {
		$this->display('tianjia');
	}

	public function showtype() {
		$User = M('nav');
		//$list = $User->limit(10)->order('id asc')->select();
		//$this->assign('list',$list);

		$count = $User->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
		$show = $Page->show(); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('sort asc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$this->assign('list', $list); // 赋值数据集
		$this->assign('page', $show); // 赋值分页输出
		$this->display('showtype');
	}
	public function xiugai() {
		$id = I('id');
		$Form = M('type');
		// 读取数据
		$data = $Form->find($id);
		if ($data) {
			$this->assign('data', $data); // 模板变量赋值
		} else {
			$this->error('数据错误');
		}

		$this->assign('data', $data);
		$this->display('xiugai');
	}
	public function addtype() {
		$Form = D('type');
		if ($Form->create()) {
			$result = $Form->add();
			if ($result) {
				$this->success('操作成功！');
			} else {
				$this->error('写入错误！');
			}
		} else {
			$this->error($Form->getError());
		}
		//echo "ha";
	}

	public function updatetype() {

		$data['id'] = I('id');
		$data['type'] = I('type');
		$data['test'] = I('test');
		$Form = D('type');
		if ($Form->create($data)) {
			$result = $Form->save();
			if ($result) {
				$this->success('操作成功！');
			} else {
				$this->error('写入错误！');
			}
		} else {
			$this->error($Form->getError());
		}
	}

	public function delete() {
		$Form = M('nav');
		$result = $Form->save();
		if ($Form->delete(I('id'))) {
			$this->success('操作成功！');
		} else {
			$this->error('写入错误！');
		}

	}

	public function outLogin() {

	}
}