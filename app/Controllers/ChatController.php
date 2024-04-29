<?php

namespace App\Controllers;

use  \Config\Services;


class ChatController extends BaseController
{
    public function index()
    {
        return view('chat/index');
    }
}
    