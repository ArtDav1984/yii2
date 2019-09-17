<?php

use yii\helpers\Html;

$this->title = 'Update Salary: ' . $salary->employees['first_name'].' '.$salary->employees['last_name'];

?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/salary/index">Salaries</a></li>
        <li class="active">Update</li>
    </ol>
</div>
<div class="salary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('salary', 'employeesList')) ?>

</div>
