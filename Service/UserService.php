<?php

namespace App\Slim\Service;

use App\Slim\Utils\DTO\User;

interface UserService
{
    public function getUser(): User;
}