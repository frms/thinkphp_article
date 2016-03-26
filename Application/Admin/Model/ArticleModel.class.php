<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class ArticleModel extends RelationModel {
	protected $_validate = array(
		array('title', 'require', '栏目名称不得为空！'), //默认情况下用正则进行验证
		array('typeid', 'require', '栏目名称不得为空！'), //默认情况下用正则进行验证
		array('id', 'require', '栏目id不得为空！'), //默认情况下用正则进行验证
		array('id', '', '栏目id已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
	);
	protected $_link = array(
		'Dept' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'nav',
			'foreign_key' => 'typeid2',
			'as_fields' => 'typename',
		),
	);

}