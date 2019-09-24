<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Skill;
use yii\web\UploadedFile;
use yii\data\Pagination;

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
		$skill = Skill::findOne($id);
		
		return $this->render('view', compact('skill'));
	}
	
    public function actionCreate()
    {
	    $skill = new Skill();
	
	    if ($skill->load(Yii::$app->request->post())) {
            $skill->image = UploadedFile::getInstance($skill, 'image');

            if ($skill->save()) {
	            $skill->image->saveAs('uploads/skills/' . $skill->image->baseName . '.' . $skill->image->extension);
	            
                return $this->redirect(['view', 'id' => $skill->id]);
            }
	    }
	
	    return $this->render('create', compact('skill'));
    }
	
    public function actionUpdate($id)
    {
        $skill = Skill::findOne($id);
        $image = $skill->image;

        if ($skill->load(Yii::$app->request->post())) {
            $skill->image = UploadedFile::getInstance($skill, 'image');

            if ($skill->save()) {
	            $skill->image->saveAs('uploads/skills/' . $skill->image->baseName . '.' . $skill->image->extension);
	
	            if (file_exists('uploads/skills/' . $image)){
		            unlink('uploads/skills/' . $image);
	            }
	            
                return $this->redirect(['view', 'id' => $skill->id]);
            }
        }

        return $this->render('update', compact('skill'));
    }
	
    public function actionDelete($id)
    {
        $skill = Skill::findOne($id);
	
	    if (file_exists('uploads/skills/' . $skill->image)) {
		    unlink('uploads/skills/' . $skill->image);
	    }
	
	    $skill->delete();

        return $this->redirect(['index']);
    }
}
