<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
<div class="jobs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jobs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jobid',
            'jobcategoryid',
            'courseid',
            'jobname:ntext',
            'timefrom',
            //'timeto',
            //'period:ntext',
            //'contactperson:ntext',
            //'persons',
            //'persons_found',
            //'alert',
            //'notification_alert',
            //'urgent',
            //'urgentmessage:ntext',
            //'repeat',
            //'location:ntext',
            //'active',
            //'completed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
