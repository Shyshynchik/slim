<?php

namespace App\Slim\Utils\Builder;

use App\Slim\Utils\DTO\User;
use DateTime;

interface Builder
{
    public function getGender(): string;

    public function getFirsName(): string;

    public function getLastName(): string;

    public function getCity(): string;

    public function getState(): string;

    public function getCountry(): string;

    public function getUserName(): string;

    public function getBirthday(): string;

    public function getPhoneNumber(): string;


    public function setGender(string $gender): self;

    public function setFirsName(string $firsName): self;

    public function setLastName(string $lastName): self;

    public function setCity(string $city): self;

    public function setState(string $state): self;

    public function setCountry(string $country): self;

    public function setUserName(string $userName): self;

    public function setBirthday(string $birthday): self;

    public function setPhoneNumber(string $phoneNumber): self;

    public function build(): User;
}