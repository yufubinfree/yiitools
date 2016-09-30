<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $cssOptions = ['position' => \yii\web\View::POS_HEAD];
    private static $positionDef = array(
        1 => \yii\web\View::POS_HEAD,
        2 => \yii\web\View::POS_END,
    );
    public $css = [
    'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public static function addScript($view, $jsfile, $position = 1) { 
        $view->registerJsFile($jsfile, array( 
            // AppAsset::className(), 
            // 'depends' => 'yii\bootstrap\BootstrapAsset', 
            'position' => self::$positionDef[$position]
        )); 
    } 
    
    //定义按需加载css方法，注意加载顺序在最后 
    public static function addCss($view, $cssfile, $position = 1) { 
        $view->registerCssFile($cssfile, array(
            // AppAsset::className(), 
            // 'depends' => 'yii\bootstrap\BootstrapAsset', 
            'position' => self::$positionDef[$position]
        )); 
    } 
}
