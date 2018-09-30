<?php

namespace API\App\Blog\Entity;

use API\App\Blog\Manager\CommentManager;

class Comment extends CommentManager {

	protected $id;
	protected $author;
	protected $creationDate;
	protected $updateDate;
	protected $content;
	protected $newsId;
	protected $validated;

	public function getId() :integer {	
		return $this->id;
	}
	
	public function setId(integer $id) :self {	
		$this->id = $id;

		return $this;
	}

	public function getAuthor() :string {	
		return $this->author;
	}

	public function setAuthor(string $author) :self {
		$this->author = $author;

		return $this;
	}

	public function getCreationDate() :\DateTime {	
		return $this->creationDate;
	}
	
	public function setCreationDate(\DateTime $creationDate) :self {	
		$this->position = $creationDate;

		return $this;
	}

	public function getUpdateDate() :\DateTime {	
		return $this->updateDate;
	}
	
	public function setUpdateDate(\DateTime $updateDate) :self {
		$this->position = $updateDate;

		return $this;
	}

	public function getContent() :string {
		return $this->content;
	}

	public function setContent(string $content) :self {	
		$this->content = $content;

		return $this;
	}

	public function getNewsId() :integer {	
		return $this->newsId;
	}
	
	public function setNewsId(integer $newsId) :self {	
		$this->newsId = $newsId;

		return $this;
	}

	public function getValidated() :boolean {
		return $this->validated;
	}

	public function setValidated(boolean $validated) :self {	
		$this->validated = $validated;

		return $this;
	}
}