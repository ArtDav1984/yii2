<?php
	
	
	namespace app\controllers;
	
	use yii\web\Controller;
	
	class EmployeeController extends Controller
	{
		public function actionIndex()
		{
			return $this->render('view');
		}
	}