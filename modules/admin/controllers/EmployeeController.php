<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Employee;
use app\modules\admin\models\Company;
use app\modules\admin\models\Department;
use app\modules\admin\models\Skill;
use app\modules\admin\models\EmployeesSkill;
use yii\web\UploadedFile;
use yii\data\Pagination;


/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends AppAdminController
{
    public function actionIndex()
	{
		$query = Employee::find()->with('companies', 'departments', 'employeesSkills.skills');
		
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
		$employee = Employee::find()->with('companies', 'departments', 'salaries', 'employeesSkills.skills')->where(['id' => $id])->one();
		
		return $this->render('view', compact('employee'));
	}
	
	public function actionCreate()
	{
		$employee = new Employee();
		$employeesSkill = new EmployeesSkill();
		
		$companies = Company::find()->asArray()->all();
		$departments = Department::find()->asArray()->all();
		$skills = Skill::find()->asArray()->all();
		
		$companiesList = $this->createList($companies, 'id', 'name');
		$departmentsList = $this->createList($departments, 'id', 'name');
		$skillsList = $this->createList($skills, 'id', 'name');
		
		if ($employee->load(Yii::$app->request->post())) {
			$birthday = Yii::$app->request->post('Employee')['birthday'];
			$employee->age = $this->calculateAge($birthday);
			$employee->birthday = date_format(date_create("$birthday"), "Y-m-d");

            $employee->image = UploadedFile::getInstance($employee, 'image');
            if (!is_null($employee->image)) {
	            $employee->image->saveAs('uploads/employees/' . $employee->image->baseName . '.' . $employee->image->extension);
            }

			if ($employee->save()) {
				if (Yii::$app->request->post('skills_id')) {
					$skills_ids = Yii::$app->request->post("skills_id");

					foreach ($skills_ids as $item) {
						Yii::$app->db->createCommand()
						             ->insert('employees_skills', [
							                  'employees_id' => $employee->id,
							                  'skills_id' => $item,
						             ])->execute();
					}
				}

                return $this->redirect(['view', 'id' => $employee->id]);
			}
		}
		
		return $this->render('create', compact('employee', 'employeesSkill',
			'companiesList', 'departmentsList', 'skillsList'));
	}
	
	public function actionUpdate($id)
	{
		$employee = Employee::find()->with('companies', 'departments')->where(['id' => $id])->one();
		$employeesSkill = EmployeesSkill::find()->where(['employees_id' => $id])->all();
		$image = $employee->image;

		$companies = Company::find()->asArray()->all();
		$departments = Department::find()->asArray()->all();
		$skills = Skill::find()->asArray()->all();
		
		$companiesList = $this->createList($companies, 'id', 'name');
		$departmentsList = $this->createList($departments, 'id', 'name');
		$skillsList = $this->createList($skills, 'id', 'name');

		if ($employee->load(Yii::$app->request->post())) {
			$birthday = Yii::$app->request->post('Employee')['birthday'];
			$employee->age = $this->calculateAge($birthday);
			$employee->birthday = date_format(date_create("$birthday"), "Y-m-d");

            $employee->image = UploadedFile::getInstance($employee, 'image');

            if ($image) {
                if (file_exists('uploads/employees/' . $image)) {
                    unlink('uploads/employees/' . $image);
                }
            }
            if (!is_null($employee->image)) {
	            $employee->image->saveAs('uploads/employees/' . $employee->image->baseName . '.' . $employee->image->extension);
            }
			
			if ($employee->save()) {
                if (Yii::$app->request->post('skills_id')) {
                    $skills_ids = Yii::$app->request->post("skills_id");
				
                    $empSkills=EmployeesSkill::find()->where(['employees_id' => $id])
                                                     ->andWhere(['not in','skills_id',$skills_ids])
                                                     ->all();

                    foreach ($empSkills as $empSkill){
                        $empSkill->delete();
                    }

	                for($i = 0; $i < count($skills_ids); $i ++){
	                    if(EmployeesSkill::find()->where(['skills_id' => $skills_ids[$i]])
                                                 ->andWhere(['employees_id' => $id])
                                                 ->count()==0){
	                        Yii::$app->db->createCommand()
                                ->insert('employees_skills', [
                                    'employees_id' => $id,
                                    'skills_id' => $skills_ids[$i],
                                ])->execute();
	                    }
	                }
                }

				return $this->redirect(['view', 'id' => $employee->id]);
			}
		}

		return $this->render('update', compact('employee', 'employeesSkill',
			'companiesList', 'departmentsList', 'skillsList'));
	}
	
	public function actionDelete($id)
	{
		$employee = Employee::findOne($id);
		$image = $employee->image;
		$employee->delete();
		
		if ($image) {
		    if (file_exists('uploads/employees/' . $image)) {
                unlink('uploads/employees/' . $image);
            }
		}
		
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
		while($date > $dob = strtotime('+1 year', $dob)) {
			++$age;
		}
		return $age;
	}
}
