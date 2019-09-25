<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\News;
use yii\data\Pagination;


/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends AppAdminController
{
    public function actionIndex()
    {
	    $query = News::find();
	
	    $count = $query->count();
	
	    $pagination = new Pagination(['totalCount' => $count]);
	    $pagination->defaultPageSize = 10;
	
	    $news = $query->offset($pagination->offset)
	                    ->limit($pagination->limit)
	                    ->all();
	
	    return $this->render('index', compact('news', 'pagination'));
    }

    public function actionView($id)
    {
	    $news = News::findOne($id);
	
	    return $this->render('view', compact('news'));
    }
	
    public function actionCreate()
    {
	    $news = new News();
	
	    if ($news->load(Yii::$app->request->post()) && $news->save()) {
		    return $this->redirect(['view', 'id' => $news->id]);
	    }
	
	    return $this->render('create', compact('news'));
    }

    public function actionUpdate($id)
    {
	    $news = News::findOne($id);
	
	    if ($news->load(Yii::$app->request->post()) && $news->save()) {
		    return $this->redirect(['view', 'id' => $news->id]);
	    }
	
	    return $this->render('update', compact('news'));
    }
	
    public function actionDelete($id)
    {
	    News::findOne($id)->delete();
	
	    return $this->redirect(['index']);
    }
}
