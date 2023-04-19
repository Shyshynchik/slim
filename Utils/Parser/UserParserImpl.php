<?php

namespace App\Slim\Utils\Parser;

use App\Slim\Utils\Builder\Builder;
use App\Slim\Utils\DTO\User;
use DateTime;
use DateTimeInterface;

class UserParserImpl implements UserParser
{

    private Builder $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }


    public function parseUser(array $userArray): User
    {
        $userData = $userArray['results'][0];

        $birthday = $this->getDatetimeFromString($userData['dob']['date']);

        return $this->builder
            ->setGender($userData['gender'])
            ->setFirsName($userData['name']['first'])
            ->setLastName($userData['name']['last'])
            ->setCity($userData['location']['city'])
            ->setState($userData['location']['state'])
            ->setCountry($userData['location']['country'])
            ->setUserName($userData['login']['username'])
            ->setBirthday($birthday->format("d.m.Y"))
            ->setPhoneNumber($userData['phone'])->build();
    }

    private function getDatetimeFromString($date): DateTime
    {
        return DateTime::createFromFormat(DateTimeInterface::RFC3339_EXTENDED, $date);
    }
}