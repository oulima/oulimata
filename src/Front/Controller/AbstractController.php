<?php

namespace App\Front\Controller;

abstract class AbstractController
{
	protected function render(string $view, array $uriVars = []):void
	{
		// extract convertit les clés d'un array en variable
		extract($uriVars);
		require_once __DIR__ . "/../../../templates/$view.php";
	}
}