<?php

namespace App\Front\Controller;

use App\Front\Controller\AbstractController;

class NotFoundController extends AbstractController
{
	public function index(array $uriVars = [])
	{
		$this->render('not-found/index');
	}
}