<?php

namespace App\API\Core;

class Container
{
	public function get(string $idService)
	{
		$services = [
			'controller.homepage' => function(){
				return new \App\API\Controller\HomepageController();
			},
			'controller.not.found' => function(){
				return new \App\API\Controller\NotFoundController();
			}
		];

		return $services[$idService]();
	}
}