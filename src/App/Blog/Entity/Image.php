<?php

namespace API\App\Blog\Entity;

use API\App\Blog\Manager\ImageManager;

class Image extends ImageManager {

	private $id;
	private $url;
	private $name;

	public function getId() :int {
		return $this->id;
	}

	public function setId(int $id) :self {
		$this->id = $id;

		return $this;
	}

	public function getUrl() :string {
		return $this->url;
	}

	public function setUrl(string $url) :self {
		$this->url = $url;

		return $this;
	}

	public function getName() :string {
		return $this->name;
	}

	public function setName(string $name) :self {
		$this->name = $name;

		return $this;
	}
}