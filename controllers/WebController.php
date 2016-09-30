<?php
/**
 * 网页访问控制器
 */

namespace app\controllers;

use yii\web\Controller;

class WebController extends controller {
	# 需要传递给smart的数据
	public $sd = [];
	
	public function init() {
		parent::init();

		$this->request = \YII::$app->request;
	}

	public function assign($key, $value) {
		$this->sd[$key] = $value;
	}

	public function A($msg) {
		echo $msg;
	}

	public function J($msg) {
		echo json_encode($msg);
	}
}