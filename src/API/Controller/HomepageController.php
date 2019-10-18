<?php

namespace App\API\Controller;

use App\API\Controller\AbstractController;
use App\API\Repository\CityRepository;

class HomepageController extends AbstractController
{
	private $cityRepository;

	public function __construct(CityRepository $cityRepository)
	{
		$this->cityRepository = $cityRepository;
	}

	public function index(array $uriVars = [])
	{
		$this->render([
			'cities' => $this->cityRepository->findAll()
		]);
	}
}





