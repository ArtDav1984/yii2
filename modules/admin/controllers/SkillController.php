<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Skill;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

/**
 * SkillController implements the CRUD actions for Skill model.
 */
class SkillController extends AppAdminController
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
	
	public function actionView($id)
	{
		$skill = $this->findModel($id);
		
		return $this->render('view', compact('skill'));
	}
	
    public function actionCreate()
    {
	    $skill = new Skill();
	
	    if ($skill->load(Yii::$app->request->post())) {
            $skill->image = UploadedFile::getInstance($skill, 'image');
            if (!is_null($skill->image)) {
                if ($skill->validate()) {
                    $skill->image->saveAs('uploads/skills/' . $skill->image->baseName . '.' . $skill->image->extension);
                }
            }

            if ($skill->save()) {
                return $this->redirect(['view', 'id' => $skill->id]);
            }
	    }
	
	    return $this->render('create', compact('skill'));
    }
	
    public function actionUpdate($id)
    {
        $skill = $this->findModel($id);

        if ($skill->load(Yii::$app->request->post())) {
            $skill->image = UploadedFile::getInstance($skill, 'image');
            $image = Skill::find()->select('image')
                                  ->where(['id' => $id])
                                  ->asArray()
                                  ->one()['image'];

            if ($image) {
                unlink('uploads/skills/' . $image);
            }

            if (!is_null($skill->image)) {
                if ($skill->validate()) {
                    $skill->image->saveAs('uploads/skills/' . $skill->image->baseName . '.' . $skill->image->extension);
                }
            }

            if ($skill->save()) {
                return $this->redirect(['view', 'id' => $skill->id]);
            }
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
