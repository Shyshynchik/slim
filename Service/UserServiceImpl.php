<?php

namespace App\Slim\Service;

use App\Slim\Utils\DTO\User;
use App\Slim\Utils\Parser\UserParser;
use GuzzleHttp\Client;

class UserServiceImpl implements UserService
{

    private UserParser $userParser;

    public function __construct(UserParser $userParser)
    {
        $this->userParser = $userParser;
    }

    public function getUser(): User
    {
        $client = new Client();

        $res = $client->request('GET', 'https://randomuser.me/api/');

        $userArr = json_decode($res->getBody()->getContents(), true);

        return $this->userParser->parseUser($userArr);
    }
}