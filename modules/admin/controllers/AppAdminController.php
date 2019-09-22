<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 22.09.2019
 * Time: 23:04
 */

namespace app\modules\admin\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class AppAdminController extends Controller
{
    public function behaviors()
    {
        return [
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         'allow' => true,
                         'roles' => ['@']
                     ]
                 ]
             ]
        ];
    }
}