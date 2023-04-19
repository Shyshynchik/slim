<?php

use App\Slim\Service\UserService;
use App\Slim\Service\UserServiceImpl;

use App\Slim\Utils\Builder\Builder;
use App\Slim\Utils\Builder\UserBuilder;
use App\Slim\Utils\Parser\UserParser;
use App\Slim\Utils\Parser\UserParserImpl;
use function DI\create;
use function DI\get;

return [
    UserService::class => create(UserServiceImpl::class)->constructor(get(UserParser::class)),
    UserParser::class => create(UserParserImpl::class)->constructor(get(Builder::class)),
    Builder::class => create(UserBuilder::class)
];