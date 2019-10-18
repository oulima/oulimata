<?php

namespace App\API\Migrations;

abstract class AbstractMigrations
{
	public function getSQL():string
	{
		return $this->sql;
	}
}