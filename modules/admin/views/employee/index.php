<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */

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
            <th>City</th>
            <th>Company</th>
            <th>Department</th>
            <th>Skill</th>
            <th>Name</th>
            <th>Age</th>
            <th colspan="3">Operations</th>
        </tr>
		<?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo $employee->city; ?></td>
                <td><?php echo $employee->companies['name']; ?></td>
                <td><?php echo $employee->departments['name']; ?></td>
                <td>
					<?php $employeesSkills = $employee->employeesSkills; ?>
					<?php
						$skills = '';
						foreach ($employeesSkills as $employeesSkill):
							?>
							<?php  $skills.=$employeesSkill['skills']['name'].', ' ?>
						<?php endforeach;
						$skills = rtrim($skills,', ');
						echo $skills;
					?>

                </td>
                <td><?php echo $employee->first_name.' '.$employee->last_name; ?></td>
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
    
    <?php echo LinkPager::widget([
	    'pagination' => $pagination,
    ]); ?>
    
</div>
