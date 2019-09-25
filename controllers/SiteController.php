<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\modules\admin\models\Skill;
use app\modules\admin\models\Employee;
use app\modules\admin\models\News;
use yii\data\Pagination;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }
	
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
    public function actionIndex()
    {
	    $query = News::find();
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 3;
	
	    $news = $query->offset($pagination->offset)
	                  ->limit($pagination->limit)
	                  ->all();
	
	    return $this->render('index', compact('news', 'pagination'));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact('artur.davoyan1984@gmail.com')) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
	
    public function actionAbout()
    {
	    $query = Skill::find();
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 5;
	
	    $skills = $query->offset($pagination->offset)
	                       ->limit($pagination->limit)
	                       ->asArray()
	                       ->all();
    	
        return $this->render('about', compact('skills', 'pagination'));
    }
	
	public function actionEmployee()
	{
		$query = Employee::find()->with('companies', 'departments','employeesSkills.skills');
		
		$count = $query->count();
		
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->defaultPageSize = 6;
		
		$employees = $query->offset($pagination->offset)
		                   ->limit($pagination->limit)
		                   ->all();
		
		return $this->render('employee', compact('employees', 'pagination'));
	}
}
