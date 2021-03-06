<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Employee */
	
	$this->title = 'Create Employee';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/employee/index']) ?>">Employees</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-create">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?= $this->render('_form', compact('employee', 'employeesSkill', 'companiesList',
        'departmentsList', 'skillsList')) ?>

</div>
