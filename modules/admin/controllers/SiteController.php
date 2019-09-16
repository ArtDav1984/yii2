<?php
	/**
	 * Created by PhpStorm.
	 * User: User
	 * Date: 11.09.2019
	 * Time: 14:38
	 */
	
	namespace app\modules\admin\controllers;
	
	use app\modules\admin\models\Company;
	use app\modules\admin\models\Department;
	use app\modules\admin\models\Employee;
	use app\modules\admin\models\Skill;
	use app\modules\admin\models\Salary;
	use yii\web\Controller;
	
	class SiteController extends Controller
	{
		public function actionIndex()
		{
			$companies = Company::find()->asArray()->all();
			$departmentsCount = Department::find()->count();
			$employeesCount = Employee::find()->count();
			$skillsCount = Skill::find()->count();
			$monthlySalary = Salary::find()->sum('salary');
			return $this->render('index',
				compact('companies', 'monthlySalary', 'departmentsCount', 'employeesCount', 'skillsCount'));
		}
	}