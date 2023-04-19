<?php

namespace App\Slim\Utils\Builder;

use App\Slim\Utils\DTO\User;
use DateTime;

class UserBuilder implements Builder
{
    private string $gender;
    private string $firsName;
    private string $lastName;

    private string $city;
    private string $state;
    private string $country;

    private string $userName;
    private string $birthday;

    private string $phoneNumber;

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getFirsName(): string
    {
        return $this->firsName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }


    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function setFirsName(string $firsName): self
    {
        $this->firsName = $firsName;
        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function build(): User
    {
        return new User($this);
    }
}