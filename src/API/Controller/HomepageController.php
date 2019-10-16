<?php

namespace App\API\Controller;

use App\API\Controller\AbstractController;

class HomepageController extends AbstractController
{
	public function index(array $uriVars = [])
	{
		$this->render();
	}
}