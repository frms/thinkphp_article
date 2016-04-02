<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL' => 2,
	//路由定义
	'MODULE_ALLOW_LIST' => array('Home', 'manager', 'User'),
	'DEFAULT_MODULE' => 'Home',
	'URL_MODULE_MAP' => array('manager' => 'admin'),
	//'ERROR_PAGE' => '/404.html',

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