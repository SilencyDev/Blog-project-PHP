<?php

namespace API\App\Blog\Entity;

use API\App\Blog\Manager\ImageManager;

class Image extends ImageManager {

	protected $id;
	protected $url;
	protected $name;

	public function getId() :integer {
		return $this->id;
	}

	public function setId(integer $id) :self {
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