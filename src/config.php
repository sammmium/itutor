<?php

return [
	'app_name' => 'Учительская',
    'owner' => 'Татьяна Самойлова',
    'developer' => 'sammmium.dev@gmail.com',

	'sections' => [
		['alias' => 'dashboard', 'name' => 'Главная', 'path' => '/', 'enabled' => true],
		['alias' => 'schedules', 'name' => 'Расписание', 'path' => '/schedules', 'enabled' => true],
		['alias' => 'contacts', 'name' => 'Контакты', 'path' => '/contacts', 'enabled' => true],
		['alias' => 'reports', 'name' => 'Отчеты', 'path' => '/reports', 'enabled' => true]
	],

	'db' => [
		'name' => 'tutor',
		'host' => 'localhost',
		'user' => 'root',
		'password' => 'phpdeveloper'
	]
];
