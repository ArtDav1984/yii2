<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 08.09.2019
 * Time: 22:24
 */

namespace app\assets;


use yii\web\AssetBundle;

class LtAppAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js'
    ];

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_HEAD
    ];
}