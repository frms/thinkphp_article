<?php
return array(
	//'配置项'=>'配置值'
	// 添加数据库配置信息
	'URL_ROUTER_ON' => true,
	'URL_ROUTE_RULES' => array(
		'asset-store/:id\d$' => 'Home/Article/index',
		'asset-store/:name$' => 'Home/Article/index',
		'asset-store/:year\d/:month\d$' => 'Home/Article/index',

		'page/:id\d$' => 'Home/Page/index',
		'page/:name$' => 'Home/Page/index',
		'page/:year\d/:month\d$' => 'Home/Page/index',
	),
);