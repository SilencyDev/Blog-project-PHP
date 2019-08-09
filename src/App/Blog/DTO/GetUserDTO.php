<?php

namespace API\App\Blog\DTO;

class GetUserDTO implements DTOInterface {

    private $id;
	private $firstName;
	private $lastName;
	private $pseudo;
	private $password;
	private $email;
	private $dateOfBirth;
	private $administrator;
	private $profileDate;

  public function getId() :int {
		return $this->id;
	}

	public function setId(int $id) :self {
		$this->id = $id;

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

	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}

	public function setDateOfBirth($dateOfBirth) :self {
		$this->dateOfBirth = $dateOfBirth;

		return $this;
	}

	public function getAdministrator() :bool{
		return $this->administrator;
	}

	public function setAdministrator(bool $administrator) :self {
		$this->administrator = $administrator;

		return $this;
	}

	public function getProfileDate() {
		return $this->profileDate;
	}

	public function setProfileDate($profileDate) :self {
		$this->profileDate = $profileDate;

		return $this;
	}
}