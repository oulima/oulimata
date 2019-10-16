<?php

namespace App\API\Controller;

use App\API\Controller\AbstractController;

class NotFoundController extends AbstractController
{
	public function index(array $uriVars = [])
	{
		$this->render('not-found/index');
	}
}