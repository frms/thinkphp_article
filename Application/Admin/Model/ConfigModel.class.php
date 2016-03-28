<?php
namespace Admin\Model;
use Think\Model;

class ConfigModel extends Model {
	protected $_validate = array(
		array('title', 'require', '栏目名称不得为空！'), //默认情况下用正则进行验证

	);

}