<?php

namespace App\Slim\Utils\Parser;

use App\Slim\Utils\DTO\User;

interface UserParser
{
    public function parseUser(array $userArray): User;
}