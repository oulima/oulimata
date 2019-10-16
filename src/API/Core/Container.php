<?php

namespace App\API\Core;

class Container
{
	private $services = [];

	public function get(string $idService)
	{
		$this->services = [
			'controller.homepage' => function(){
				return new \App\API\Controller\HomepageController();
			},
			'controller.not.found' => function(){
				return new \App\API\Controller\NotFoundController();
			},
			'core.dotenv' => function(){
				return new \App\API\Core\Dotenv();
			},
			'core.database' => function(){
				return new \App\API\Core\Database(
					$this->services['core.dotenv']()
				);
			},

		];

		return $this->services[$idService]();
	}
}