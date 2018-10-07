<?php

namespace App\Http\Controllers;

use App\Http\Response;

class BaseController extends Controller
{
    protected $response;


    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
