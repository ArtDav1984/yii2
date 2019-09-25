<?php
	
	
	namespace app\controllers;
	
	use yii\web\Controller;
	use app\modules\admin\models\Employee;
	
	class EmployeeController extends Controller
	{
		public function actionView($id)
		{
			$employee = Employee::find()->with('companies', 'departments', 'salaries', 'employeesSkills.skills')
			                            ->where(['id' => $id])
			                            ->one();
			
			return $this->render('view', compact('employee'));
		}
	}