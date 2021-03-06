<?php

namespace app\src\controllers;

use app\src\core\controller;

/**
 * TestController
 */
class TestController extends Controller
{

    public function index(){
        $model = "test";
        $this->loadModel($model);
        $tests = $this->$model->getAll();
        
        $this->render('test', 'index', [
            'tests' => $tests,
        ]);
    }

    public function voir(string $slug){
        $model = "test";
        $this->loadModel($model);
        $tests = $this->$model->findBySlug($slug);

        $this->render('test', 'voir', [
            'tests' => $tests,
        ]);
    }
}