<?php

namespace API\App\Blog\DTO;

class GetCommentDTO implements DTOInterface  {

	private $id;
    private $userId;
    private $pseudo;
	private $creationDate;
	private $content;
	private $newsId;

	public function getId() :int {	
		return $this->id;
	}
	
	public function setId(int $id) :self {	
		$this->id = $id;

		return $this;
	}

	public function getUserId() :string {	
		return $this->userId;
	}

	public function setUserId(string $userId) :self {
		$this->userId = $userId;

		return $this;
    }
    
    public function getPseudo() :string {	
		return $this->pseudo;
	}

	public function setPseudo(string $pseudo) :self {
		$this->pseudo = $pseudo;

		return $this;
	}

	public function getCreationDate() {	
		return $this->creationDate;
	}
	
	public function setCreationDate($creationDate) :self {	
		$this->position = $creationDate;

		return $this;
	}

	public function getContent() :string {
		return $this->content;
	}

	public function setContent(string $content) :self {	
		$this->content = $content;

		return $this;
	}

	public function getNewsId() :int {	
		return $this->newsId;
	}
	
	public function setNewsId(int $newsId) :self {	
		$this->newsId = $newsId;

		return $this;
	}
}