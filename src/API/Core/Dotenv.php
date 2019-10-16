<?php

namespace App\API\Core;

class Dotenv
{
	private $params = [];

	public function __construct()
	{
		$file = file(__DIR__ . '/../../../.env');

		foreach($file as $line){
			$split = preg_split('#=#', $line);
			$this->params[$split[0]] =
				preg_replace('#\r|\n#', '', $split[1]);
		}
	}

	public function get(string $param):string
	{
		return $this->params[strtoupper($param)];
	}

}







