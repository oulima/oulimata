<?php

namespace App\API\Entity;

class City implements \JsonSerializable
{
	private $id;
	private $name;
	private $image;

	public function jsonSerialize():array
	{
		return [
			'id' => $this->getId(),
			'name' => $this->getName(),
			'image' => $this->getImage(),
		];
	}

	public function getId():?int { return $this->id; }
public function setId(?int $id):void { $this->id = $id;}

public function getName():string { return $this->name; }
public function setName(string $name):void { $this->name = $name;}

public function getImage():string { return $this->image; }
public function setImage(string $image):void { $this->image = $image;}
}