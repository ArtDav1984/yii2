<?php
	
	use yii\helpers\Html;
	
	/* @var $this yii\web\View */
	
	$this->title = 'View';
	\yii\web\YiiAsset::register($this);

?>
<div class="breadcrumbs">
	<ol class="breadcrumb">
		<li><a href="/admin">Dashboard</a></li>
		<li><a href="/admin/skill/index">Skills</a></li>
		<li class="active"><?= $this->title; ?></li>
	</ol>
</div>
<div class="employee-view">
	
	<h1><?= Html::encode($skill->name) ?></h1>
	
	<p>
		<?= Html::a('Update', ['update', 'id' => $skill->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $skill->id], [
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
			<td><?php echo $skill->id; ?></td>
		</tr>
		<tr>
			<td><b>Skill Name</b></td>
			<td><?php echo $skill->name; ?></td>
		</tr>
	</table>

</div>