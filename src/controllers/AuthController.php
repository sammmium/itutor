<?php

namespace src\Controllers;

require 'MainController.php';

class AuthController extends MainController
{
	protected array $config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function index()
	{

	}
}
