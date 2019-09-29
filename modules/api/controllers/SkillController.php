<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 29.09.2019
 * Time: 21:15
 */

namespace app\modules\api\controllers;

use yii;
use yii\web\Controller;
use app\modules\admin\models\Skill;
use yii\filters\VerbFilter;

class SkillController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'view' => ['get'],
                    'create' => ['post'],
                    'update' => ['post'],
                    'delete' => ['get']
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $skills = Skill::find()->asArray()->all();

        if (count($skills) > 0) {
            return array('status' => true, 'data' => $skills);
        } else {
            return array('status' => false, 'data' => 'skills not found');
        }
    }

    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $skill = $skill = Skill::findOne($id);

        if ($skill !== null) {
            return array('status' => true, 'data' => $skill);
        } else {
            return array('status' => false, 'data' => 'skill not found');
        }
    }

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $skill = new Skill();
        //$skill->scenario = Skill::SCENARIO_CREATE;
        $skill->attributes = \yii::$app->request->post();
        if ($skill->validate()) {
            $skill->save();
            return array('status' => true, 'data' => 'Skill record is successfully created');
        } else {
            return array('status' => false, 'data' => $skill->getErrors());
        }
    }

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $skill = Skill::findOne($id);
        $skill->attributes = \yii::$app->request->post();
        if ($skill->validate()) {
            $skill->save();
            return array('status' => true, 'data' => 'Skill record is successfully updated');
        } else {
            return array('status' => false, 'data' => $skill->getErrors());
        }
    }

    public function actionDelete($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $skill = Skill::findOne($id);

        if ($skill !== null) {
            $skill->delete();
            return array('status' => true, 'data' => 'Skill record is successfully deleted');
        } else {
            return array('status' => false, 'data' => 'skill not found');
        }
    }
}