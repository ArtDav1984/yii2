<?php
	/**
	 * Created by PhpStorm.
	 * User: User
	 * Date: 11.09.2019
	 * Time: 14:38
	 */
	
	namespace app\modules\admin\controllers;
	
	use app\modules\admin\models\Company;
	use yii\web\Controller;
	
	class SiteController extends Controller
	{
		public function actionIndex()
		{
			$companies = Company::find()->asArray()->all();
			return $this->render('index', compact('companies'));
		}
	}