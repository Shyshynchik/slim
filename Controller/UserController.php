<?php

namespace App\Slim\Controller;

use App\Slim\Service\UserService;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserController
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function get(Request $request, Response $response): Response
    {
        $user = $this->userService->getUser();
        $response->getBody()->write((string)$user);
        return $response;
    }
}