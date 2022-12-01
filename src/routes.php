<?php

return [

	'/' => [
		'controller' => 'DashboardController',
		'action' => 'index',
		'view' => 'dashboard/index.twig',
		'selected_menu_item' => 'dashboard'
	],

	'/auth' => [
		'controller' => 'AuthController',
		'action' => 'index',
		'view' => 'auth/index.twig',
		'selected_menu_item' => 'auth'
	],

	'/contacts' => [
		'controller' => 'ContactsController',
		'action' => 'index',
		'view' => 'contacts/index.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contact/create' => [
		'controller' => 'ContactsController',
		'action' => 'create',
		'view' => 'contacts/create.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contact/save' => [
		'controller' => 'ContactsController',
		'action' => 'store',
		'view' => 'contacts/index.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contact/edit/{id}' => [
		'controller' => 'ContactsController',
		'action' => 'edit',
		'view' => 'contacts/edit.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contact/update/{id}' => [
		'controller' => 'ContactsController',
		'action' => 'update',
		'view' => 'contacts/index.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contact/archive/{id}' => [
		'controller' => 'ContactsController',
		'action' => 'archive',
		'view' => 'contacts/index.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contacts/archive' => [
		'controller' => 'ContactsController',
		'action' => 'contacts_archived',
		'view' => 'contacts/archive.twig',
		'selected_menu_item' => 'contacts'
	],
	'/contact/restore/{id}' => [
		'controller' => 'ContactsController',
		'action' => 'restore',
		'view' => 'contacts/index.twig',
		'selected_menu_item' => 'contacts'
	],

	'/schedules' => [
		'controller' => 'SchedulesController',
		'action' => 'index',
		'view' => 'schedules/index.twig',
		'selected_menu_item' => 'schedules'
	],
	'/schedules/select_date' => [
		'controller' => 'SchedulesController',
		'action' => 'select_date',
		'view' => 'schedules/index.twig',
		'selected_menu_item' => 'schedules'
	],
	'/schedules/lesson/add' => [
		'controller' => 'SchedulesController',
		'action' => 'lesson_add',
		'view' => 'schedules/lesson_add.twig',
		'selected_menu_item' => 'schedules'
	],
	'/schedules/lesson/create' => [
		'controller' => 'SchedulesController',
		'action' => 'lesson_create',
		'view' => 'schedules/index.twig',
		'selected_menu_item' => 'schedules'
	],
	'/schedules/lesson/done/{id}' => [
		'controller' => 'SchedulesController',
		'action' => 'lesson_done',
		'view' => 'schedules/index.twig',
		'selected_menu_item' => 'schedules'
	],
	'/schedules/lesson/delete/{id}' => [
		'controller' => 'SchedulesController',
		'action' => 'lesson_delete',
		'view' => 'schedules/index.twig',
		'selected_menu_item' => 'schedules'
	],



	'/subjects' => [
		'controller' => 'SubjectsController',
		'action' => 'index',
		'view' => 'subjects/index.twig',
		'selected_menu_item' => 'subjects'
	]

];
