<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Salary;
use app\modules\admin\models\Employee;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\VerbFilter;

/**
 * SalaryController implements the CRUD actions for Salary model.
 */
class SalaryController extends Controller
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
        $employees = Employee::find()->select('id, first_name, last_name')
                                     ->asArray()
                                     ->all();
        
        $employeesList = $this->createList($employees);
        
        if ($salary->load(Yii::$app->request->post())) {
	        $create_at = Yii::$app->request->post('Salary')['create_at'];
	        $salary->create_at = date_format(date_create("$create_at"), "Y-m-d");
	        
	        if ($salary->save()) {
		        return $this->redirect(['view', 'id' => $salary->id]);
	        }
        }

        return $this->render('create', compact('salary', 'employeesList'));
    }
	
    public function actionUpdate($id)
    {
        $salary = Salary::find()->with('employees')->where(['id' => $id])->one();
	    $employees = Employee::find()->select('id, first_name, last_name')
	                         ->asArray()
	                         ->all();
	
	    $employeesList = $this->createList($employees);
	
	    if ($salary->load(Yii::$app->request->post())) {
		    $create_at = Yii::$app->request->post('Salary')['create_at'];
		    $salary->create_at = date_format(date_create("$create_at"), "Y-m-d");
		
		    if ($salary->save()) {
			    return $this->redirect(['view', 'id' => $salary->id]);
		    }
	    }

        return $this->render('update', compact('salary', 'employeesList'));
    }
	
    public function actionDelete($id)
    {
        Salary::findOne($id)->delete();

        return $this->redirect(['index']);
    }
	
	protected function createList($model)
	{
		$list = [];
		
		foreach ($model as $item) {
			$list[$item['id']] = $item['first_name'].' '.$item['last_name'];
		}
		
		return $list;
	}
}
