<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 20.01.2020
 * Time: 1:05
 */

namespace app\assets;


use yii\web\AssetBundle;

class AppAssetsStripe extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/stripe.css',
    ];
    public $js = [
        'https://js.stripe.com/v3/',
        'js/charge.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}