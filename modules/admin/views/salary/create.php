<?php

use yii\helpers\Html;

$this->title = 'Create Salary';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/salary/index">Salaries</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="salary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('salary', 'employeesList')) ?>

</div>
