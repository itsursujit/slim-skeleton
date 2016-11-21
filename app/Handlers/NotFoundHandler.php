<?php

namespace App\Handler;

// name espace you need set on project

use Slim\Handlers\NotFound;
use Slim\Http\Request;
use Slim\Http\Response;

class NotFoundHandler extends NotFound
{
    public $renderer;

    public function __construct()
    {
        //$this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response)
    {
        parent::__invoke($request, $response);

        $newResponse = $response->withHeader('Content-type', 'application/json');
        $body = $newResponse->getBody();
        $newResponse->withStatus(404);
        $body->write(json_encode(['404' => 'Page Not Found']));

        return $newResponse;
    }
}
