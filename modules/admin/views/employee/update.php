<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Employee */

$this->title = 'Update Employee';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/employee/index">Employees</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-update">

    <h1><?= Html::encode($this->title.': ' . $model->id) ?></h1>

    <?= $this->render('_form', compact('model', 'companiesList')) ?>

</div>
