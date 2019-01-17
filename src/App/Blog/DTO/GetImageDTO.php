<?php

namespace API\App\Blog\DTO;

class GetImageDTO implements DTOInterface {
    
    private $id;
	private $name;
    private $url;
    private $link;

	public function getId() :int {	
		return $this->id;
	}

	public function setId(int $id) :self {	
		$this->id = $id;

		return $this;
	}

	public function getName() :string {	
		return $this->name;
	}
	
	public function setName(string $name) :self {
		$this->name = $name;

		return $this;
	}

	public function getUrl() :string {
		return $this->url;
	}
	
	public function setUrl(string $url) :self {
		$this->url = $url;

		return $this;
    }

    public function getLink() :string {
		return $this->link;
	}
	
	public function setLink(string $link) :self {
		$this->link = $link;

		return $this;
    }
}