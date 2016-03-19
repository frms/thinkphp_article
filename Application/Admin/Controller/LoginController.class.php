<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
	public function login() {
		if (IS_POST) {
			$username = I('username');
			$password = I('password');
			$captcha = I('captcha');

			$verify = new \Think\Verify();
			if ($verify->check($captcha)) {
				//$this->success('验证成功');
			} else {
				$this->error('验证填写错误！');
				return;
			}

			if (D('admin')->checklogin($username, $password)) {

				$this->success('登陆成功', U('Index/index'), 2);

			} else {
				$this->error('登陆失败');

			}

			return;
		}
		$this->display('login');
	}

	public function code() {
		$Verify = new \Think\Verify();
		$Verify->entry();
	}

	public function logout() {
		session('admin', null);
		$this->success('成功退出系统！', U('login'), 1);
	}

}