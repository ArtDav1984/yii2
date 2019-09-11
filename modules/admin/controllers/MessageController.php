<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Jobs;
use Yii;
use app\modules\admin\models\messages;
use yii\data\ActiveDataProvider;
use yii\swiftmailer\Message;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for messages model.
 */
class MessageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all messages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $message = Jobs::find()->asArray()->all();
        return $this->render('index', compact('message'));
    }
}
