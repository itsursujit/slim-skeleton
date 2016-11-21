<?php

namespace app\Controllers;

use App\Model\Customer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class WelcomeController extends Controller
{
    public $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function dispatch(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $customer = new Customer();
        $data = $customer->getOrderById(1);
        $this->renderer->render($response, 'welcome/index.phtml', $data);
    }
}
