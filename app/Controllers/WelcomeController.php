<?php

namespace app\Controllers;

use App\Model\Customer;
use Slim\Http\Request;
use Slim\Http\Response;

class WelcomeController extends Controller
{
    public $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function dispatch(Request $request, Response $response, array $args)
    {
        $customer = new Customer();
        $data = $customer->getOrderById(1);
        $this->renderer->render($response, 'welcome/index.phtml', $data);
    }
}
