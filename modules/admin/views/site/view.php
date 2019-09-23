<?php
	
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\helpers\Url;
 
?>
<div class="breadcrumbs">
	<ol class="breadcrumb">
		<li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
		<li class="active"><?= $this->title; ?></li>
	</ol>
</div>
<div class="employee-index">
	
	<h1><?= Html::encode($this->title.' employees') ?></h1>
	
	<p>Count: <?= count($employees); ?></p>
	
	<table class="table-bordered table-striped table">
		<tr>
			<th>City</th>
			<th>Company</th>
			<th>Department</th>
			<th>Skill</th>
			<th>Name</th>
			<th>Age</th>
			<th colspan="3">Actions</th>
		</tr>
		<?php foreach ($employees as $employee): ?>
			<tr>
				<td><?= $employee->city; ?></td>
				<td><?= $employee->companies['name']; ?></td>
				<td><?= $employee->departments['name']; ?></td>
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
				<td><?= $employee->first_name.' '.$employee->last_name; ?></td>
				<td><?= $employee->age; ?></td>
				<td><?= Html::a('<i class="fa fa-eye">', ['/admin/employee/view', 'id' => $employee['id']]) ?></td>
				<td><?= Html::a('<i class="fa fa-pencil-square-o">', ['/admin/employee/update', 'id' => $employee['id']]) ?></td>
				<td><?= Html::a('<i class="fa fa-times"></i>', ['/admin/employee/delete', 'id' => $employee['id']], [   'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
					]) ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	
	<?= LinkPager::widget([
		'pagination' => $pagination,
	]); ?>

</div>
