<?php

namespace App\API\Core;

use App\API\Core\Dotenv;

class Database
{
	private $connection;
	private $dotenv;

	public function __construct(Dotenv $dotenv)
	{
		$this->dotenv = $dotenv;
		$this->connection = new \PDO(
			"mysql:host={$this->dotenv->get('db_host')};dbname={$this->dotenv->get('db_name')};charset=utf8",
			$this->dotenv->get('db_user'),
			$this->dotenv->get('db_pwd'),
			[
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
			]
		);
	}

	public function connect():\PDO
	{
		return  $this->connection;
	}
}





