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
	use app\modules\admin\models\Partner;
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
		
		public function actionView($id)
		{
			$this->view->title = Company::findOne($id)['name'];
			
			$query = Employee::find()->with('companies', 'departments', 'employeesSkills.skills')
			                         ->where(['companies_id' => $id]);
			
			$count = $query->count();
			
			$pagination = new Pagination(['totalCount' => $count]);
			$pagination->defaultPageSize = 10;
			
			$employees = $query->offset($pagination->offset)
			                   ->limit($pagination->limit)
			                   ->all();
			
			return $this->render('view', compact('employees', 'pagination'));
		}

        protected function generatePassword($length) {
            $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $count = mb_strlen($chars);

            for ($i = 0, $result = ''; $i < $length; $i++) {
                $index = rand(0, $count - 1);
                $result .= mb_substr($chars, $index, 1);
            }

            return $result;
        }
	}