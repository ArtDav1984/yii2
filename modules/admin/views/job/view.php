<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\jobs */

$this->title = $model->jobid;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jobs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jobid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jobid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jobid',
            'jobcategoryid',
            'courseid',
            'jobname:ntext',
            'timefrom',
            'timeto',
            'period:ntext',
            'contactperson:ntext',
            'persons',
            'persons_found',
            'alert',
            'notification_alert',
            'urgent',
            'urgentmessage:ntext',
            'repeat',
            'location:ntext',
            'active',
            'completed',
        ],
    ]) ?>

</div>
