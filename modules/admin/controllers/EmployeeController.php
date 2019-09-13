<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Employee;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EmployeeController extends Controller
{
    public function actionIndex($id)
    {
	    $employees = $this->findModel()->where(['companies_id' => $id])->all();
	    
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionDelete($id)
    {
        $model = Employee::findOne($id);
        $model->delete();

        return $this->redirect(['index', 'id' => $model->companies_id]);
    }

    protected function findModel()
    {
        $employee = Employee::find()->with('companies', 'departments', 'skillsEmployees.skills');

        return $employee;
    }
}
