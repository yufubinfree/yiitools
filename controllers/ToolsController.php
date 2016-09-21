<?php
/**
 * Created by PhpStorm.
 * User: yufubin
 * Date: 16/7/27
 * Time: 下午5:08
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Tools;
use app\controllers\WebController;

class ToolsController extends WebController
{
    # 工具需要用到的常用类
    public $m = null;
    public $title = '';

    # 需要传递给smart的数据
    public $sd = [];
    public $request = null;



    public function init() {
        parent::init();
        $this->enableCsrfValidation = false;

        $this->m = new Tools();
    }

    public function actionIndex() {
        $this->title = '常用链接';
        return $this->render('index.tpl', $this->sd);
    }
    
    public function actionUsefulThing() {
        $this->title = '转换工具';

        return $this->render('index.tpl', $this->sd);
    }
}