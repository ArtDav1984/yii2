<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Skill;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * SkillController implements the CRUD actions for Skill model.
 */
class SkillController extends Controller
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
	    $query = Skill::find();
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 10;
	
	    $skills = $query->offset($pagination->offset)
	                       ->limit($pagination->limit)
	                       ->all();
	
	    return $this->render('index', compact('skills', 'pagination'));
    }
	
	public function actionView($id)
	{
		$skill = $this->findModel($id);
		
		return $this->render('view', compact('skill'));
	}
	
    public function actionCreate()
    {
	    $skill = new Skill();
	
	    if ($skill->load(Yii::$app->request->post()) && $skill->save()) {
		    return $this->redirect(['view', 'id' => $skill->id]);
	    }
	
	    return $this->render('create', compact('skill'));
    }
	
    public function actionUpdate($id)
    {
        $skill = $this->findModel($id);

        if ($skill->load(Yii::$app->request->post()) && $skill->save()) {
            return $this->redirect(['view', 'id' => $skill->id]);
        }

        return $this->render('update', compact('skill'));
    }
	
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	protected function findModel($id)
	{
		if (($model = Skill::findOne($id)) !== null) {
			return $model;
		}
		
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
