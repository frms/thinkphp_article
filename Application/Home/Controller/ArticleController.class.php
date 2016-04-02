<?php
namespace Home\Controller;
use Think\Controller;

class ArticleController extends BaseController {
	public function index() {
		$Form = M('article');
		$map['url'] = I('name');
		// 读取数据
		$data = $Form->where($map)->find();
		if ($data) {
			$this->assign('data', $data); // 模板变量赋值
		} else {
			$this->error('Data Error');
		}

		$comment = $this->CommentList($pid = 0, $commentList = array(), $spac = 0);
		$this->assign('commentList', $comment);

		$this->assign('data', $data);
		$this->display('article');

	}

	public function addComment() {

		$data['content'] = I("post.comment");
		$data['ip'] = get_client_ip();
		$data['add_time'] = time();
		$data['pid'] = I('post.pid');
		$data['author'] = I('post.username');
		$data['articleurl'] = I('post.articleurl');

		$comment = D('comment'); // 实例化User对象
		if (!$comment->create($data)) {
			//验证昵称和评论
			$this->error($comment->getError());
		} else {
			$add = $comment->add();
			if ($add) {
				$this->success('Comment Success');

			} else {
				$this->error('Comment Failed');
			}
		}

	}

	//评论列表
	function CommentList($pid = 0, &$commentList = array(), $spac = 0) {
		$map['articleurl'] = I('name');
		static $i = 0;
		$spac = $spac + 1; //初始为1级评论
		$List = M('comment')->
			field('id,add_time,author,content,pid')->
			where(array('pid' => $pid))->where($map)->order("id DESC")->select();
		foreach ($List as $k => $v) {
			$commentList[$i]['level'] = $spac; //评论层级
			$commentList[$i]['author'] = $v['author'];
			$commentList[$i]['id'] = $v['id'];
			$commentList[$i]['pid'] = $v['pid']; //此条评论的父id
			$commentList[$i]['content'] = $v['content'];
			$commentList[$i]['time'] = $v['add_time'];
			// $commentList[$i]['pauthor']=$pautor;
			$i++;
			$this->CommentList($v['id'], $commentList, $spac);
		}
		return $commentList;
	}

}
