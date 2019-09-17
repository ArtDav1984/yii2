<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Employee;
use app\modules\admin\models\Company;
use app\modules\admin\models\Department;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
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
	
	public function actionIndex()
	{
		$query = Employee::find()->with('companies', 'departments', 'skillsEmployees.skills');
		
		$count = $query->count();
		
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->defaultPageSize = 10;
		
		$employees = $query->offset($pagination->offset)
		                   ->limit($pagination->limit)
		                   ->all();
		
		return $this->render('index', compact('employees', 'pagination'));
	}
	
	public function actionView($id)
	{
		$employee = Employee::find()->with('companies', 'departments', 'salaries', 'skillsEmployees.skills')
		                            ->where(['id' => $id])->one();;
		
		return $this->render('view', compact('employee'));
	}
	
	public function actionCreate()
	{
		$employee = new Employee();
		$companies = Company::find()->asArray()->all();
		$departments = Department::find()->asArray()->all();
		$companiesList = $this->createList($companies, 'id', 'name');
		$departmentsList = $this->createList($departments, 'id', 'name');
		
		if ($employee->load(Yii::$app->request->post())) {
			$birthday = Yii::$app->request->post('Employee')['birthday'];
			$employee->age = $this->calculateAge($birthday);
			$employee->birthday = date_format(date_create("$birthday"), "Y-m-d");
			if ($employee->save()) {
				return $this->redirect(['view', 'id' => $employee->id]);
			}
		}
		
		return $this->render('create', compact('employee', 'companiesList', 'departmentsList'));
	}
	
	public function actionUpdate($id)
	{
		$employee = Employee::find()->with('companies', 'departments')->where(['id' => $id])->one();
		$companies = Company::find()->asArray()->all();
		$departments = Department::find()->asArray()->all();
		$companiesList = $this->createList($companies, 'id', 'name');
		$departmentsList = $this->createList($departments, 'id', 'name');
		
		if ($employee->load(Yii::$app->request->post())) {
			$birthday = Yii::$app->request->post('Employee')['birthday'];
			$employee->age = $this->calculateAge($birthday);
			$employee->birthday = date_format(date_create("$birthday"), "Y-m-d");
			if ($employee->save()) {
				return $this->redirect(['view', 'id' => $employee->id]);
			}
		}
		
		return $this->render('update', compact('employee', 'companiesList', 'departmentsList'));
	}
	
	public function actionDelete($id)
	{
		Employee::findOne($id)->delete();
		
		return $this->redirect(['index']);
	}
	
	protected function createList($model, $id, $name)
	{
		$list = [];
		foreach ($model as $item) {
			$list[$item[$id]] = $item[$name];
		}
		return $list;
	}
	
	protected function calculateAge($birthdayDate)
	{
		$dob = strtotime(str_replace("/","-",$birthdayDate));
		$date = time();
		$age = 0;
		while($date > $dob = strtotime('+1 year', $dob))
		{
			++$age;
		}
		return $age;
	}
}
