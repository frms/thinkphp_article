<?php
namespace Admin\Controller;
use Think\Controller;

class NoticeController extends BaseController {
	public function notice() {
		$config = M("notice"); // 实例化User对象
		// 查找status值为1name值为think的用户数据
		$data = $config->where('id = 1')->find();
		$this->assign('data', $data);
		$this->display();
	}

	public function updatenotice() {
		$data['id'] = I('id');
		$data['noticecontent'] = I('noticecontent');
		$config = D('notice');
		if ($config->create($data)) {
			$result = $config->save();
			if ($result) {
				$this->success('操作成功！');
			} else {
				$this->error('写入错误！');
			}
		} else {
			$this->error($Form->getError());
		}
	}

}