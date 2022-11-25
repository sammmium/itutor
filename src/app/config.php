<?php
return [
	/* site */
	'site' => [
		'name' => 'ITutor',
		'title' => 'IT',
		'owner' => 'Tanya Samoilova',
	],
	'template_dir' => 'src/app/views',
	'menus' => [
		["id" => "/schedule", "name" => "Графики"],
		["id" => "/subjects", "name" => "Уроки"],
		["id" => "/contacts", "name" => "Контакты"],
		["id" => "/reports", "name" => "Отчеты"]
	],

	/* database */
	'database' => [
		'name' => 'itutor',
		'host' => 'localhost',
		'user' => 'root',
		'password' => 'phpdeveloper'
	]
];