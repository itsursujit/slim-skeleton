<?php

namespace app\Controllers;

use App\Model\Customer;
use Slim\Http\Request;
use Slim\Http\Response;

class OrderController extends Controller
{
    public $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function getOrder(Request $request, Response $response, array $args)
    {
        $id = $request->getAttribute('id');
        $customer = new Customer();
        $data = $customer->getOrderById($id);
        $newResponse = $response->withHeader('Content-type', 'application/json');
        $body = $newResponse->getBody();
        $body->write($data);

        return $newResponse;
    }

    public function cancelOrder(Request $request, Response $response, array $args)
    {
        $id = $request->getAttribute('id');
        $customer = new Customer();
        $data = json_decode($customer->getOrderById($id), true);
        $result = [];
        if (!empty($data) && empty($data['error'])) {
            if ($data['order_status'] == 2) {
                $result = ['error' => 'Order Already Cancelled'];
            } elseif ($data['order_status'] == 1) {
                $customer->cancelOrder($id);
            }
        } else {
            $result = ['error' => 'No Order Found with that Id'];
        }

        $newResponse = $response->withHeader('Content-type', 'application/json');
        $body = $newResponse->getBody();

        if (count($result) > 0) {
            $body->write(json_encode($result));
        } else {
            $body->write(json_encode($data));
        }

        return $newResponse;
    }
}
