<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Employee */

$this->title = 'Update Employee: '.$employee->first_name.' '.$employee->last_name;
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/employee/index">Employees</a></li>
        <li class="active">Update</li>
    </ol>
</div>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php
    echo $this->render('_form', compact('employee', 'employeesSkill', 'companiesList',
		'departmentsList', 'skillsList'))
    ?>

</div>
