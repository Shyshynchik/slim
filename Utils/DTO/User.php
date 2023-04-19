<?php

namespace App\Slim\Utils\DTO;

use App\Slim\Utils\Builder\Builder;
use DateTime;
use ReflectionClass;

class User
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

    public function __construct(Builder $userBuilder)
    {
        $this->gender = $userBuilder->getGender();
        $this->firsName = $userBuilder->getFirsName();
        $this->lastName = $userBuilder->getLastName();
        $this->city = $userBuilder->getCity();
        $this->state = $userBuilder->getState();
        $this->country = $userBuilder->getCountry();
        $this->userName = $userBuilder->getUserName();
        $this->birthday = $userBuilder->getBirthday();
        $this->phoneNumber = $userBuilder->getPhoneNumber();
    }

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

    public function __toString(): string
    {
        $str = "{\n";
        $reflectionClass = new ReflectionClass(self::class);
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $propName = $property->name;
            $propValue = $this->$propName;
            $str .= "\t\"$propName\":\"$propValue\"";
            if ($property !== end($properties)) {
                $str .= ",";
            }
            $str .= "\n";
        }

        return $str . "}";
    }
}