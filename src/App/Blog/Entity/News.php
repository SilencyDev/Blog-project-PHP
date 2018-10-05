<?php

namespace API\App\Blog\Entity;

use API\App\Blog\Manager\NewsManager;

class News extends NewsManager {

	protected $id;
	protected $userId;
	protected $imageId;
	protected $content;
	protected $title;
	protected $creationDate;
	protected $updateDate;
	protected $category;
  
	public function getId() :integer {	
		return $this->id;
	}

	public function setId(integer $id) :self {	
		$this->id = $id;

		return $this;
	}

	public function getUserId() :integer {	
		return $this->userId;
	}
	
	public function setUserId(integer $userId) :self {
		$this->userId = $userId;

		return $this;
	}

	public function getImageId() :integer {
		return $this->imageId;
	}
	
	public function setImageId(integer $imageId) :self {
		$this->imageId = $imageId;

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
	
	public function setUpdateDate($updateDate) :self {
		$this->update = $updateDate;

		return $this;
	}

	public function getCategory() :string {
		return $this->category;
	}

	public function setCategory(string $category) :self {
		$this->category = $category;

		return $this;
	}
}