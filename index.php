<?php

namespace App\Slim;

use App\Slim\Controller\UserController;
use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;

require __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/di-config.php';


$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($config);
$containerBuilder->useAutowiring(true);

$container = $containerBuilder->build();


$app = Bridge::create($container);

$app->addErrorMiddleware(false, true, true);

$app->get('/user', [UserController::class, 'get']);

$app->run();