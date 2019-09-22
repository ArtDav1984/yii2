<?php
	/**
	 * Created by PhpStorm.
	 * User: User
	 * Date: 11.09.2019
	 * Time: 14:38
	 */
	
	namespace app\modules\admin\controllers;
	
	use Yii;
	use app\modules\admin\models\Company;
	use app\modules\admin\models\Department;
	use app\modules\admin\models\Employee;
	use app\modules\admin\models\Skill;
	use app\modules\admin\models\Salary;
	use yii\data\Pagination;
	
	
	
	class SiteController extends AppAdminController
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
		
		public function actionSearch()
		{
		    $empName = trim(Yii::$app->request->get('employee'));

		    if (!$empName) {
                return $this->render('search');
            }

			$query = Employee::find()->with('companies', 'departments', 'salaries', 'employeesSkills.skills')
			                         ->andFilterWhere ( [ 'OR' ,
                                         [ 'like' , 'first_name' , $empName ],
                                         [ 'like' , 'last_name' , $empName ],
                                         [ 'like' , 'CONCAT(first_name, " " , last_name)' , $empName ],
                                         [ 'like' , 'CONCAT(last_name, " " , first_name)' , $empName ],
                                     ] )
			                         ->orderBy(['first_name'=>SORT_DESC]);
			
			$count = $query->count();
			
			$pagination = new Pagination(['totalCount' => $count]);
			$pagination->defaultPageSize = 10;
			
			$employees = $query->offset($pagination->offset)
			                   ->limit($pagination->limit)
			                   ->all();
			
			return $this->render('search', compact('employees', 'pagination'));
		}
	}