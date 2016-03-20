<?php
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends BaseController {
	public function add() {

		$type = D('type');
		$res = $type->select();
		$this->assign('list', $res);
		$this->display('add');
	}
	public function showlist() {
		$User = D('article');
		//$list = $User->limit(10)->order('id asc')->select();
		//$this->assign('list',$list);

		$count = $User->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$show = $Page->show(); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('id asc')->limit($Page->firstRow . ',' . $Page->listRows)->relation(true)->select();
		$this->assign('list', $list); // 赋值数据集
		$this->assign('page', $show); // 赋值分页输出
		$this->display('showlist');
	}
	public function addArticle() {
		$data['title'] = I('title');
		$data['author'] = I('author');
		$data['new'] = I('new');
		$data['hot'] = I('hot');
		$data['des'] = I('des');
		$data['typeid2'] = I('typeid');
		$data['time'] = time();
		if ($_FILES['pic']['tmp_name'] != "") {
			$upload = new \Think\Upload(); // 实例化上传类
			$upload->maxSize = 3145728; // 设置附件上传大小
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->rootPath = './';
			$upload->savePath = './Public/Uploads/'; // 设置附件上传目录    // 上传单个文件
			$info = $upload->uploadOne($_FILES['pic']);
			if (!$info) {
				$this->error($upload->getError());
			} else {
				// 上传成功 获取上传文件信息
				$data['pic'] = $info['savepath'] . $info['savename'];
			}
		}
		$Form = D('article');
		if ($Form->create($data)) {
			$result = $Form->add();
			if ($result) {
				$this->success('操作成功！');
			} else {
				$this->error('写入错误！');
			}
		} else {
			$this->error($Form->getError());
		}
		//$this->display('add');
	}

	public function head() {
		$this->display('head');
	}

	public function left() {
		$this->display('left');

	}
	public function delete() {
		$Form = M('article');
		$result = $Form->save();
		if ($Form->delete(I('id'))) {
			$this->success('操作成功！');
		} else {
			$this->error('写入错误！');
		}

	}
}