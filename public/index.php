<?php

try {
    require __DIR__.'/../app/Config/autoload.php';
    session_start();

    $app = new \Slim\App($settings);

    require __DIR__.'/../app/Config/bootstrap.php';

// Run app
    $app->run();
} catch (Exception $e) {
    echo 'Something went wrong';
}
