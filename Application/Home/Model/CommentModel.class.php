<?php
namespace Home\Model;
use Think\Model;

class CommentModel extends Model {
	protected $_validate = array(
		array('author', 'require', 'Nickname cannot be empty!'), //默认情况下用正则进行验证
		array('content', 'require', 'Content can not be empty!'), //默认情况下用正则进行验证

	);

}