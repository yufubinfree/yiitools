<?php
/**
 * Created by PhpStorm.
 * User: yufubin
 * Date: 16/7/27
 * Time: 下午5:08
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\ToolsModel;
use app\controllers\WebController;

class ToolsController extends WebController
{
    # 工具需要用到的常用类
    public $m = null;
    public $t = null; # 小工具类
    public $v = null; # 视图层

    public $title = '';
    public $data = '';

    # 需要传递给smart的数据
    public $sd = [];
    public $request = null;

    public function init()
    {
        parent::init();
        $this->enableCsrfValidation = false;

        $this->m = new ToolsModel;
        $this->t = new \Tools;
        $this->v = $this->getView();

        $this->v->title = '常用工具';

        $this->data = $this->getRequestData();
    }

    public function getRequestData()
    {
        return array(
            'texta' => $this->request->post('texta'),
            'textb' => $this->request->post('textb'),
        );
    }

    public function actionIndex()
    {
        return $this->render('index.tpl', $this->sd);
    }

    public function actionTest()
    {
        $this->v->title = '测试页面';

        return $this->render('test.tpl', $this->sd);
    }

    public function actionLinkChange()
    {
        $this->A(urldecode($this->data['texta']));
    }

    public function actionChangeJson()
    {
        $this->A(print_r(json_decode($this->data['texta'], true), true));
    }

    public function actionShowTime()
    {
        $data = $this->t->getArrayBack($this->data['texta']);

        $ret = array();
        foreach ($data as $v) {
            $ret[] = array(
                'Value' => $v,
                'Date'  => date("Y-m-d H:i:s", $v),
            );
            // $this->A("{$v} : " . date("Y-m-d H:i:s", $v) . "\n");
        }

        echo $this->t->print_ar($ret);
    }

    public function actionDiffData()
    {
        $dataa = $this->t->getArrayBack($this->data['texta']);
        $datab = $this->t->getArrayBack($this->data['textb']);

        $ab = array_diff($dataa, $datab);
        $ba = array_diff($datab, $dataa);
        $aandb = array_intersect($datab, $dataa);

        $abc = array_merge($ab, $ba);

        echo $this->t->print_ar(array(
            array(
                'Type'   => 'DIFF',
                'Result' => '<pre>' . print_r($abc, true) . '</pre>',
            ), array(
                'Type'   => 'A > B',
                'Result' => '<pre>' . print_r($ab, true) . '</pre>',
            ), array(
                'Type'   => 'B > A',
                'Result' => '<pre>' . print_r($ba, true) . '</pre>',
            ), array(
                'Type'   => 'A & B',
                'Result' => '<pre>' . print_r($aandb, true) . '</pre>',
            ),
        ));
    }

    public function actionGetQr()
    {
        echo $this->t->qr($this->request->get('qr'));
    }

    public function actionQrcode()
    {
        $data = $this->t->getArrayBack($this->data['texta']);

        $ret = array();

        foreach ($data as $v) {
            $ret[] = array(
                'Data' => $v,
                'QR'   => "<img src='/index.php?r=tools/get-qr&qr={$v}' style='width:100px;height:100px; margin-top:10px; margin-bottom:10px;' alt='{$v}'>" ,
            );
        }

        echo $this->t->print_ar($ret);
    }

    public function actionClearSame()
    {
        $data = $this->t->getArrayBack($this->data['texta']);
        foreach (array_unique($data) as $v) {
            echo $v . "\n";
        }
    }

    public function actionSort()
    {
        $data = $this->t->getArrayBack($this->data['texta']);
        sort($data);
        foreach ($data as $v) {
            echo $v . "\n";
        }
    }

    public function actionKSort()
    {
        $data = $this->t->getArrayBack($this->data['texta']);
        sort($data);
        foreach (array_reverse($data) as $v) {
            echo $v . "\n";
        }
    }

    public function actionUsefulThing()
    {
        $this->title = '转换工具';

        return $this->render('test.tpl', $this->sd);
    }
}
