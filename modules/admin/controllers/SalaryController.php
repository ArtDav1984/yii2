<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Salary;
use app\modules\admin\models\SalariesHistory;
use app\modules\admin\models\Employee;
use yii\data\Pagination;
use yii\filters\VerbFilter;

/**
 * SalaryController implements the CRUD actions for Salary model.
 */
class SalaryController extends AppAdminController
{
    public function actionIndex()
    {
	    $query = Salary::find()->with('employees');
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 10;
	
	    $salaries = $query->offset($pagination->offset)
	                    ->limit($pagination->limit)
	                    ->all();
	
	    return $this->render('index', compact('salaries', 'pagination'));
    }
	
    public function actionView($id)
    {
	    $salary = Salary::find()->with('employees')
	                            ->where(['id' => $id])->one();;
	
	    return $this->render('view', compact('salary'));
    }
	
    public function actionCreate()
    {
        $salary = new Salary();
        $salariesHistory = new SalariesHistory();
        $employees = Employee::find()->with('salaries')
                                     ->select('id, first_name, last_name')
                                     ->asArray()
                                     ->all();

        $employeesList = [];

        foreach ($employees as $employee) {
            $employeesList[$employee['id']] = $employee['first_name'].' '.$employee['last_name'];
            unset($employeesList[$employee['salaries']['employees_id']]);
        }
        
        if ($salary->load(Yii::$app->request->post())) {
	        $created_at = Yii::$app->request->post('Salary')['created_at'];
	        $salary->created_at = date_format(date_create("$created_at"), "Y-m-d");
	        
	        if ($salary->save()) {
	            $salariesHistory->employees_id = Yii::$app->request->post('Salary')['employees_id'];
                $salariesHistory->created_at = date_format(date_create("$created_at"), "Y-m-d");
                $salariesHistory->salary = Yii::$app->request->post('Salary')['salary'];

                if ($salariesHistory->save()) {
                    return $this->redirect(['view', 'id' => $salary->id]);
                }
	        }
        }

        return $this->render('create', compact('salary', 'employeesList'));
    }
	
    public function actionUpdate($id)
    {
        $salary = Salary::find()->with('employees')->where(['id' => $id])->one();
        $salariesHistory = new SalariesHistory();

        $employeesList = [
            $salary->employees->id => $salary->employees->first_name.' '.$salary->employees->last_name
        ];

        if ($salary->load(Yii::$app->request->post())) {
		    $created_at = Yii::$app->request->post('Salary')['created_at'];
		    $salary->created_at = date_format(date_create("$created_at"), "Y-m-d");
		
		    if ($salary->save()) {
                $salariesHistory->employees_id = Yii::$app->request->post('Salary')['employees_id'];
                $salariesHistory->created_at = date_format(date_create("$created_at"), "Y-m-d");
                $salariesHistory->salary = Yii::$app->request->post('Salary')['salary'];

                if ($salariesHistory->save()) {
                    return $this->redirect(['view', 'id' => $salary->id]);
                }
		    }
	    }

        return $this->render('update', compact('salary', 'employeesList'));
    }
	
    public function actionDelete($id)
    {
        SalariesHistory::findOne($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionHistory($id)
    {
        $query = SalariesHistory::find()->with('employees')->where(['employees_id' => $id]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->defaultPageSize = 10;

        $salariesHistory = $query->offset($pagination->offset)
                                 ->limit($pagination->limit)
                                 ->all();

        return $this->render('history', compact('salariesHistory', 'pagination'));
    }
}
