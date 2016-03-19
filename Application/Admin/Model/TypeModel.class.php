<?php
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model{
	protected $_validate=array(
		array('type','require','栏目名称不得为空！'), //默认情况下用正则进行验证
		array('type','','栏目名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('id','require','栏目id不得为空！'), //默认情况下用正则进行验证
		array('id','','栏目id已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		);

}