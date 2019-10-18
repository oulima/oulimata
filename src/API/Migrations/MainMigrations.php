<?php

namespace App\API\Migrations;

require_once 'vendor/autoload.php';

use App\API\Core\Container;

class MainMigrations
{
	public function __construct()
	{
		$directory = new \DirectoryIterator(__DIR__);
		$sql = "START TRANSACTION;";

		foreach($directory as $file) {
			if(!$file->isDot()
&& preg_match('#^Migrations#', $file->getFilename())){
$fileName = preg_replace('#\.php#', '', $file->getFilename());
				$namespace = "App\API\Migrations\\$fileName";
				$instance = new $namespace();
				$sql .= $instance->getSQL();
			}
		}
		$sql .= "COMMIT;";

		$container = new Container();
		$database = $container->get('core.database');
		$connection = $database->connect();

		$query = $connection->prepare($sql);
		$query->execute();
	}
}

$mainMigrations = new MainMigrations();





