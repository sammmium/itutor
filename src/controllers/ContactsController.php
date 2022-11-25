<?php

namespace src\Controllers;

require 'Main.php';
require '../models/Contacts.php';

class Contacts extends Main
{
	protected array $config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function index()
	{
		$model = new \src\models\Contacts();
		$model->getContactList();

		return [
			'app_name' => $this->config['app_name'],
			'menus' => $this->getMenu()
		];
	}
}
