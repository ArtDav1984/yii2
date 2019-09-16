<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Skill;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * SkillController implements the CRUD actions for Skill model.
 */
class SkillController extends Controller
{
    public function actionIndex()
    {
	    $query = Skill::find();
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 10;
	
	    $skills = $query->offset($pagination->offset)
	                       ->limit($pagination->limit)
	                       ->all();
	
	    return $this->render('index', compact('skills', 'pagination'));
    }
	
    public function actionCreate()
    {
        $model = new Skill();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
}
