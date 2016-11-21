<?php
// Routes
//$app->get('/{id}', 'OrderController:getOrder');
use app\Libraries\Route;

Route::get('/getorder/orderid/{id}', 'OrderController:getOrder');
Route::get('/cancelorder/orderid/{id}', 'OrderController:cancelOrder');