<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'View';
\yii\web\YiiAsset::register($this);
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/employee/index">Employees</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-view">

    <h1><?= Html::encode($employee->id) ?></h1>

    <p>
		<?= Html::a('Update', ['update', 'id' => $employee->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $employee->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
    </p>

    <table class="table-admin-small table-bordered table-striped table">
        <tr>
            <td><b>ID</b></td>
            <td><?php echo $employee->id; ?></td>
        </tr>
        <tr>
            <td><b>Company</b></td>
            <td><?php echo $employee->companies['name']; ?></td>
        </tr>
        <tr>
            <td><b>Department</b></td>
            <td><?php echo $employee->departments['name']; ?></td>
        </tr>
        <tr>
            <td><b>Skill</b></td>
            <td>
				<?php $skillsEmployees = $employee->skillsEmployees ?>
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
        </tr>
        <tr>
            <td><b>First Name</b></td>
            <td><?php echo $employee->first_name; ?></td>
        </tr>
        <tr>
            <td><b>Last Name</b></td>
            <td><?php echo $employee->last_name; ?></td>
        </tr>
        <tr>
            <td><b>Age</b></td>
            <td><?php echo $employee->age; ?></td>
        </tr>
        <tr>
            <td><b>Gender</b></td>
            <td><?php echo $employee['gender']; ?></td>
        </tr>
        <tr>
            <td><b>City</b></td>
            <td><?php echo $employee->city; ?></td>
        </tr>
        <tr>
            <td><b>Address</b></td>
            <td><?php echo $employee->address; ?></td>
        </tr>
        <tr>
            <td><b>Phone Number</b></td>
            <td><?php echo $employee->phone_number; ?></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><?php echo $employee->email; ?></td>
        </tr>
    </table>

</div>