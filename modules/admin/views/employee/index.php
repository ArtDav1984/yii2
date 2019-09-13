<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>Items: <?= count($employees); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>Company</th>
            <th>Department</th>
            <th>Skill</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th colspan="3">Operations</th>
        </tr>
		<?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo $employee->companies['name']; ?></td>
                <td><?php echo $employee->departments['name']; ?></td>
                <td>
                <?php $skillsEmployees = $employee->skillsEmployees; ?>
                <?php
	                $skills = '';
                    foreach ($skillsEmployees as $skillsEmployee):
                ?>
                <?php  $skills.=$skillsEmployee['skills']['name'].', ' ?>
                <?php endforeach;
                    $skills = rtrim($skills,', ');
                    echo $skills;
                ?>
                
                </td>
                <td><?php echo $employee->first_name; ?></td>
                <td><?php echo $employee->last_name; ?></td>
                <td><?php echo $employee->age; ?></td>
                <td><?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $employee['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $employee['id']]) ?></td>
                <td><?= Html::a('<i class="fa fa-times"></i>', ['delete', 'id' => $employee['id']], [   'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
					]) ?></td>
            </tr>
		<?php endforeach; ?>
    </table>


</div>
