<?php

namespace src;

use src\Controllers\DashboardController;

class Router
{
	protected string $path;

	protected array $routes;

	protected array $config;

	protected array $route = [
		'path' => '/auth',
		'controller' => 'AuthController',
		'action' => 'index',
		'view' => 'auth/index.twig',
		'selected_menu_item' => 'auth'
	];

	public function setParams(string $request_url, array $routes, array $config)
	{
		$this->path = $request_url;
		$this->routes = $routes;
		$this->config = $config;
	}

	public function init()
	{
		$result = [];

		foreach ($this->routes as $path => $data) {

			// path = /contacts/edit/{id}
			// $this->path = /contacts/edit/12

			$id = 0;
			$clearPath = '';
			$pos = strpos($path, '{id}');
			if ($pos !== false) {
				$id = mb_substr($this->path, $pos);
				$clearPath = mb_substr($this->path, 0, $pos);
				if ($clearPath === mb_substr($path, 0, $pos)) {
					$this->route = [];
					$this->route['path'] = $clearPath;
					$this->route += $data;
					break;
				}
			} else {
				if ($this->path === $path) {
					$this->route = [];
					$this->route['path'] = $path;
					$this->route += $data;
					break;
				}
			}

		}
//			var_dump($this->path, $clearPath, $id);exit;

		require_once 'controllers/' . $this->route['controller'] . '.php';
		$pathController = '\\src\\Controllers\\' . $this->route['controller'];
		$controller = new $pathController($this->config);
		$method = $this->route['action'];

		$result['attributes'] = ($id > 0) ? $controller->$method($id) : $controller->$method();
		$result['name'] = $this->route['view'];
		$result['attributes']['selected_menu_item'] = $this->route['selected_menu_item'];

//		var_dump($result['attributes']['contact_list']);exit;
//		var_dump($result['attributes']['errors']);exit;
//		var_dump($result['attributes']['memo']);exit;
//		var_dump($result);exit;
		return $result;
	}
}
