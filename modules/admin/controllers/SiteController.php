<?php
	/**
	 * Created by PhpStorm.
	 * User: User
	 * Date: 11.09.2019
	 * Time: 14:38
	 */
	
	namespace app\modules\admin\controllers;
	
	use app\modules\admin\models\Company;
	use app\modules\admin\models\City;
	use app\modules\admin\models\Department;
	use app\modules\admin\models\Employee;
	use app\modules\admin\models\Skill;
	use yii\web\Controller;
	
	class SiteController extends Controller
	{
		public function actionIndex()
		{
			$companies = Company::find()->asArray()->all();
			$citiesCount = City::find()->count();
			$departmentsCount = Department::find()->count();
			$employeesCount = Employee::find()->count();
			$skillsCount = Skill::find()->count();
			return $this->render('index',
				compact('companies', 'citiesCount', 'departmentsCount', 'employeesCount', 'skillsCount'));
		}
	}