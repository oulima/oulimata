<?php

namespace App\API\Controller;

abstract class AbstractController
{
	protected function render(array $uriVars = [], int $statusCode = 200):void
	{
		//header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

		http_response_code($statusCode);

		echo json_encode([
			'message' => 'OK',
			'status' => $statusCode
		]);
	}
}