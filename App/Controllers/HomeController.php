<?php

use App\Controllers\Controller;

require "Controller.php";

class HomeController extends Controller
{
    public function index()
    {
        $this->render('home/index');
    }
}