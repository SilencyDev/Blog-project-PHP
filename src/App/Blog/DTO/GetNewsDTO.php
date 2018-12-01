<?php

namespace API\App\Blog\DTO;

class GetNewsDTO implements DTOInterface  {
    
    private $id;
	private $userId;
	private $content;
	private $title;
	private $creationDate;
	private $updateDate;
	private $category;

	public function getId() :int {	
		return $this->id;
	}

	public function setId(int $id) :self {	
		$this->id = $id;

		return $this;
	}

	public function getUserId() :int {	
		return $this->userId;
	}
	
	public function setUserId(int $userId) :self {
		$this->userId = $userId;

		return $this;
	}

	public function getContent() :string {
		return $this->content;
	}
	
	public function setContent(string $content) :self {
		$this->content = $content;

		return $this;
	}

	public function getTitle() :string {	
		return $this->title;
	}
	
	public function setTitle(string $title) :self {
		$this->title = $title;

		return $this;
	}

	public function getCreationDate() {
		return $this->creationDate;
	}
	
	public function setCreationDate($creationDate) :self {
		$this->creationDate = $creationDate;

		return $this;
	}

	public function getUpdateDate() {
		return $this->updateDate;
	}
	
	public function setUpdateDate($updateDate = NULL) :self {
		$this->update = $updateDate;

		return $this;
	}

	public function getCategory() :string {
		return $this->category;
	}

	public function setCategory(string $category = NULL) :self {
		$this->category = $category;

		return $this;
	}
}