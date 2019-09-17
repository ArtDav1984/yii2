<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Development;
use app\modules\admin\models\Skill;
use app\modules\admin\models\Employee;
use app\modules\admin\models\Department;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * DevelopmentController implements the CRUD actions for DevelopmentController model.
 */
class DevelopmentController extends Controller
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
	    $query = Development::find()->with('skills', 'employees');
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 10;
	
	    $developments = $query->offset($pagination->offset)
	                       ->limit($pagination->limit)
	                       ->all();
	
	    return $this->render('index', compact('developments', 'pagination'));
    }
	
    public function actionView($id)
    {
	    $development = Development::find()->with('skills', 'employees')
	                        ->where(['id' => $id])->one();;
	
	    return $this->render('view', compact('development'));
    }

    public function actionCreate()
    {
        $development = new Development();
	
	    $skills = Skill::find()->asArray()->all();

	    $department = Department::find()->select('id')
                                         ->where(['name' => 'development'])
                                         ->asArray()
                                         ->one();

	    $employees = Employee::find()->select('id, first_name, last_name')
                                     ->where(['departments_id' => $department['id']])
                                     ->asArray()
                                     ->all();

	    $skillsList = $this->createSkillsList($skills);
	    $employeesList = $this->createEmployeesList($employees);
	
	    if ($development->load(Yii::$app->request->post())) {
	        $employeesSelected = Yii::$app->request->post('Development')['employees_id'];
            $skillsSelected = implode("", Yii::$app->request->post('Development')['skills_id']);

            for ($i = 0; $i < strlen($skillsSelected); $i ++) {
                Yii::$app->db->createCommand()
                    ->insert('developments', [
                        'employees_id' => $employeesSelected,
                        'skills_id' => $skillsSelected[$i],
                    ])->execute();
            }

            return $this->redirect(['view', 'id' => $department->id]);

	    }
	
	    return $this->render('create', compact('development', 'skillsList', 'employeesList'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
	
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	protected function createEmployeesList($model)
	{
		$list = [];
		foreach ($model as $item) {
			$list[$item['id']] = $item['first_name'].' '.$item['last_name'];
		}
		
		return $list;
	}
	
	protected function createSkillsList($model)
	{
		$list = [];
		foreach ($model as $item) {
			$list[$item['id']] = $item['name'];
		}
		
		return $list;
	}
}
