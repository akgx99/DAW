<?php

namespace app\src\controllers;

use app\src\core\controller;

class MainController extends Controller
{
    public function index(){
        $this->render('main', 'index', []);
    }
}