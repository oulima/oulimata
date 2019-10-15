<?php

namespace App\API\Core;

class Router
{
	private $routes = [
		'#^/$#' => [
			'controller' => 'controller.homepage',
			'method' => 'index'
		],
	];

	private $route = [
		'controller' => 'controller.not.found',
		'method' => 'index'
	];

}







