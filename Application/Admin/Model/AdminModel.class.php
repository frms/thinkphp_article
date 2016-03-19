<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model {
	public function checklogin($username, $password) {
		$condition['username'] = $username;
		$condition['password'] = md5($password);
		if ($admin = $this->where($condition)->find()) {
			session('admin', $admin);
			return true;

		} else {
			return false;

		}

	}

}