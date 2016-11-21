<?php

namespace app\Libraries;
use App\Libraries\Database;
use Slim\Http\Response;

class Model extends Database
{
    public $response;

    public function __construct()
    {
        global $settings;
        $this->response = new Response();
        parent::__construct('mysql:host='.$settings['settings']['db']['host'].';dbname='.$settings['settings']['db']['database'], $settings['settings']['db']['username'], $settings['settings']['db']['password']);
    }
}
