<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'View';
\yii\web\YiiAsset::register($this);

?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/employee/index']) ?>">Employees</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-view">

    <h1><?= Html::encode($employee->first_name.' '.$employee->last_name) ?></h1>

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
            <td><?= $employee->id; ?></td>
        </tr>
        <tr>
            <td><b>Company</b></td>
            <td><?= $employee->companies['name']; ?></td>
        </tr>
        <tr>
            <td><b>Department</b></td>
            <td><?= $employee->departments['name']; ?></td>
        </tr>
        <tr>
            <td><b>Skill</b></td>
            <td>
				<?php $employeesSkills = $employee->employeesSkills ?>
				<?php
					$skills = '';
					foreach ($employeesSkills as $employeesSkill):
						?>
						<?php  $skills .= $employeesSkill['skills']['name'].', ' ?>
					<?php endforeach;
					$skills = rtrim($skills,', ');
					echo $skills;
				?>
            </td>
        </tr>
        <tr>
            <td><b>First Name</b></td>
            <td><?= $employee->first_name; ?></td>
        </tr>
        <tr>
            <td><b>Last Name</b></td>
            <td><?= $employee->last_name; ?></td>
        </tr>
        <tr>
            <td><b>Birthday</b></td>
            <td><?= date('M j, Y', strtotime($employee->birthday)); ?></td>
        </tr>
        <tr>
            <td><b>Age</b></td>
            <td><?= $employee->age; ?></td>
        </tr>
        <tr>
            <td><b>Gender</b></td>
            <td><?= $employee['gender']; ?></td>
        </tr>
        <tr>
            <td><b>City</b></td>
            <td><?= $employee->city; ?></td>
        </tr>
        <tr>
            <td><b>Address</b></td>
            <td><?= $employee->address; ?></td>
        </tr>
        <tr>
            <td><b>Phone Number</b></td>
            <td><?= $employee->phone_number; ?></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><?= $employee->email; ?></td>
        </tr>
        <tr>
            <td><b>Salary</b></td>
            <td><?= $employee->salaries['salary'].' AMD'; ?></td>
        </tr>
        <tr>
            <td><b>Image</b></td>
            <td><?= Html::img(Url::to('@web/uploads/employees/'.$employee->image), ['class' => 'employee_image']) ?></td>
        </tr>
    </table>

</div>