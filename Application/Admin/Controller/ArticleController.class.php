<?php
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends BaseController {
	public function add() {

		$type = D('article');
		$res = $type->select();
		$this->assign('list', $res);
		$this->display('add');
	}
	public function showlist() {
		$User = D('article');
		//$list = $User->limit(10)->order('id asc')->select();
		//$this->assign('list',$list);

		$count = $User->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
		$show = $Page->show(); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->relation(true)->select();
		$this->assign('list', $list); // 赋值数据集
		$this->assign('page', $show); // 赋值分页输出
		$this->display('showlist');
	}
	public function addArticle() {
		$data['articletitle'] = I('articletitle');
		$data['desj'] = I('desj');
		$data['articlecontent'] = I('articlecontent');
		//$data['time'] = time();
		if ($_FILES['pic']['tmp_name'] != "") {
			$upload = new \Think\Upload(); // 实例化上传类
			$upload->maxSize = 3145728; // 设置附件上传大小
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->rootPath = './';
			$upload->savePath = './Uploads/image/'; // 设置附件上传目录    // 上传单个文件
			$info = $upload->uploadOne($_FILES['pic']);
			if (!$info) {
				$this->error($upload->getError());
			} else {
				// 上传成功 获取上传文件信息
				$picpath = $info['savepath'] . $info['savename'];
				$data['pic'] = substr($picpath, 1);
			}
		}
		$Form = D('article');
		if ($Form->create($data)) {
			$result = $Form->add();
			if ($result) {
				$this->success('操作成功！', U('Article/showlist'));
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
	public function edit() {
		$id = I('id');
		$Form = M('article');
		// 读取数据
		$data = $Form->find($id);
		if ($data) {
			$this->assign('data', $data); // 模板变量赋值
		} else {
			$this->error('数据错误');
		}

		$this->assign('data', $data);

		$type = M('nav');
		$res = $type->select();
		$this->assign('list', $res);

		$this->display('edit');

	}

	public function updateArticle() {
		$data['id'] = I('id');
		$data['articletitle'] = I('articletitle');
		$data['desj'] = I('desj');
		$data['articlecontent'] = I('articlecontent');
		//$data['time'] = time();
		if ($_FILES['pic']['tmp_name'] != "") {
			$upload = new \Think\Upload(); // 实例化上传类
			$upload->maxSize = 3145728; // 设置附件上传大小
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->rootPath = './';
			$upload->savePath = './Uploads/image/'; // 设置附件上传目录    // 上传单个文件
			$info = $upload->uploadOne($_FILES['pic']);
			if (!$info) {
				$this->error($upload->getError());
			} else {
				// 上传成功 获取上传文件信息
				$picpath = $info['savepath'] . $info['savename'];
				$data['pic'] = substr($picpath, 1);
			}
		}
		$Form = D('article');
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

	public function deletes() {
		$getid = I('aiticleid'); //获取选择的复选框的值
		if (!$getid) {
			$this->error('未选择记录');
		} //没选择就提示信息
		//$getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
		//$id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值
		if (is_array($getid)) {
			$where = 'id in(' . implode(',', $getid) . ')';
		} else {
			$where = 'id=' . $getid;
		}
		//最后进行数据操作,例如你的是ArticleModel
		$Result = D("Article")->where($where)->delete();
		$say = '删除成功';
		if ($Result === false) {
			$this->error('操作失败');
		} else {
			$this->assign('jumpUrl', U('Article/showlist'));
			$this->success($say);
		}

	}

	public function moves() {

	}

}