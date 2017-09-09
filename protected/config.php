<?php

date_default_timezone_set('PRC');


$config = array(
	'rewrite' => array(
		'admin/index.html' => 'admin/main/index',
		'admin/<c>_edit_<id>.html'    => 'admin/<c>/edit', 
		'admin/<c>_<a>.html'    => 'admin/<c>/<a>', 
        '<m>/<c>/<a>'          => '<m>/<c>/<a>',
		'<c>/<a>'          => '<c>/<a>',
		'wp-admin'          => 'egg/index',
		'talk-list'                => 'main/index',
		'<a>-<id>'                => 'main/<a>',
		'<redirct>'                => 'main/jump',
	),
);

$domain = array(
	"hola.party" => array( // 调试配置
		'debug' => 1,
		'mysql' => array(

				'MYSQL_HOST' => getenv('MYSQL_HOST'),
				'MYSQL_PORT' => getenv('MYSQL_PORT'),
				'MYSQL_USER' => getenv('MYSQL_USER'),
				'MYSQL_DB'   => getenv('MYSQL_DATABASE'),
				'MYSQL_PASS' => getenv('MYSQL_PASSWORD'),
				'MYSQL_CHARSET' => 'utf8',

		),
	),
	"www.hola.party" => array( // 调试配置
		'debug' => 1,
		'mysql' => array(

				'MYSQL_HOST' => getenv('MYSQL_HOST'),
				'MYSQL_PORT' => getenv('MYSQL_PORT'),
				'MYSQL_USER' => getenv('MYSQL_USER'),
				'MYSQL_DB'   => getenv('MYSQL_DATABASE'),
				'MYSQL_PASS' => getenv('MYSQL_PASSWORD'),
				'MYSQL_CHARSET' => 'utf8',

		),
	),
);
// 为了避免开始使用时会不正确配置域名导致程序错误，加入判断
if(empty($domain[$_SERVER["HTTP_HOST"]])) die("配置域名不正确，请确认".$_SERVER["HTTP_HOST"]."的配置是否存在！");

return $domain[$_SERVER["HTTP_HOST"]] + $config;
