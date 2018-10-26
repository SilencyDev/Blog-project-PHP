<?php

namespace API\App\Blog\Entity;

use API\App\Blog\Manager\UserManager;

class User extends UserManager {

	protected $id;
	protected $imageId;
	protected $firstName;
	protected $lastName;
	protected $pseudo;
	protected $password;
	protected $email;
	protected $dateOfBirth;
	protected $administrator;
	protected $profileDate;

  public function getId() :integer {
		return $this->id;
	}

	public function setId(integer $id) :self {
		$this->id = $id;

		return $this;
	}

	public function getImageId() :integer {
		return $this->imageId;
	}

	public function setImageId(integer $imageId) :self {
		$this->imageId = $imageId;

		return $this;
	}

	public function getFirstName() :string {
		return $this->firstName;
	}

	public function setFirstName(string $firstName) :self {
		$this->firstName = $firstName;

		return $this;
	}

	public function getLastName() :string {
		return $this->lastName;
	}

	public function setLastName(string $lastName) :self {
		$this->lastName = $lastName;

		return $this;
	}

	public function getPseudo() :string {
		return $this->pseudo;
	}
	
	public function setPseudo(string $pseudo) :self {
		$this->pseudo = $pseudo;

		return $this;
	}

	public function getPassword() :string {
		return $this->password;
	}

	public function setPassword(string $passwordHash) :self {
		$this->password = $passwordHash;

		return $this;
	}

	public function getEmail() :string {
		return $this->email;
	}
	
	public function setEmail(string $email) :self {
		$this->email = $email;

		return $this;
	}

	public function getDateOfBirth() :\DateTime {
		return $this->dateOfBirth;
	}

	public function setDateOfBirth(\DateTime $dateOfBirth) :self {
		$this->dateOfBirth = $dateOfBirth;

		return $this;
	}

	public function getAdministrator() {
		return $this->administrator;
	}

	public function setAdministrator($administrator) :self {
		$this->administrator = $administrator;

		return $this;
	}

	public function getProfileDate() :\DateTime {
		return $this->profileDate;
	}

	public function setProfileDate(\DateTime $profileDate) :self {
		$this->profileDate = $profileDate;

		return $this;
	}
}