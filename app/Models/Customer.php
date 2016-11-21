<?php

namespace App\Model;

use App\Libraries\Model;

class Customer extends Model
{
    public function __construct()
    {
        $this->table = 'customers';
        parent::__construct();
    }

    public function getOrderById($id)
    {
        $data = $this->query("SELECT c.*, o.* FROM customers c
                                  INNER JOIN orders o ON c.id = o.customer_id WHERE o.id = '$id' LIMIT 1");
        $dataArray = json_decode($data, true);
        $dataArray = (isset($dataArray[0])) ? $dataArray[0] : [];
        $data = json_encode($dataArray);

        return $data;
    }

    public function cancelOrder($id)
    {
        $data = $this->update('orders', ['order_status' => 2], " id = '$id'");
    }
}
