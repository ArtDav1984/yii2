<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\jobs */

$this->title = 'Update Jobs: ' . $model->jobid;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jobid, 'url' => ['view', 'id' => $model->jobid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
