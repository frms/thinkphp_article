<?php
namespace Home\Model;
use Think\Model;

class CommentModel extends Model {
	protected $_validate = array(
		array('author', 'require', '昵称不能为空！'), //默认情况下用正则进行验证
		array('content', 'require', '内容不能为空！'), //默认情况下用正则进行验证

	);

}