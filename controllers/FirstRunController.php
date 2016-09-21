<?php

namespace app\controllers;

use yii\web\Controller;

class FirstRunController extends Controller{
    public $layout = false;

    public function actionSayHello() {

//        return $this->render("index.php", ['say' => 'Hellow World!']);

        return $this->render('index.tpl', ['world' => 'world', 'fon' => 'fon', 'array'=> [
            ['name'=>'name1','value'=>'value1'],
            ['name'=>'name2','value'=>'value2'],
            ['name'=>'name3','value'=>'value3'],
        ],'number' => '1234567890', 'arrayA' => ['a' => '1']
        ]);
    }
}