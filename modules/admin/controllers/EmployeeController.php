<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Employee;
use app\modules\admin\models\Company;
use yii\web\Controller;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
	public function actionIndex()
	{
		$employees = $this->findModel()->all();
		
		return $this->render('index', compact('employees'));
	}
	
	public function actionView($id)
	{
		$employee = $this->findModel()->where(['id' => $id])->one();;
		
		return $this->render('view', compact('employee'));
	}
	
	public function actionCreate()
	{
		$model = new Employee();
		$companies = Company::find()->asArray()->all();
		$companiesList = $this->createList($companies, 'id', 'name');
		
		if ($model->load(Yii::$app->request->post())) {
            $birthday = Yii::$app->request->post('Employee')['age'];
            $model->age = $this->calculateAge($birthday);
            $model->birthday = date_format(date_create("$birthday"), "Y-m-d");
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
		}
		
		return $this->render('create', compact('model', 'companiesList'));
	}
	
	public function actionUpdate($id)
	{
        $model = $this->findModel()->where(['id' => $id])->one();
        $companies = Company::find()->asArray()->all();
		$companiesList = $this->createList($companies, 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $birthday = Yii::$app->request->post('Employee')['age'];
            $model->age = $this->calculateAge($birthday);
            $model->birthday = date_format(date_create("$birthday"), "Y-m-d");
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

		return $this->render('update', compact('model', 'companiesList'));
	}
	
	public function actionDelete($id)
	{
		Employee::findOne($id)->delete();
		
		return $this->redirect(['index']);
	}
	
	protected function findModel()
	{
		$model = Employee::find()->with('companies', 'departments', 'skillsEmployees.skills');
		
		return $model;
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
