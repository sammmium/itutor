<?php

namespace src\Controllers;

require_once 'Main.php';

class Subjects extends Main
{
	protected array $config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function index()
	{
		return [
			'app_name' => $this->config['app_name'],
			'menus' => $this->getMenu()
		];
	}
}
