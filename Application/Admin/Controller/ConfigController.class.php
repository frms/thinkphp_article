<?php
namespace Admin\Controller;
use Think\Controller;

class ConfigController extends BaseController {
	public function config() {
		$config = M("config"); // 实例化User对象
		// 查找status值为1name值为think的用户数据
		$data = $config->where('id = 1')->find();
		$this->assign('data', $data);
		$this->display();
	}

	public function updateconfig() {
		$data['id'] = I('id');
		$data['title'] = I('title');
		$data['keyword'] = I('keyword');
		$data['description'] = I('description');
		$config = D('config');
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