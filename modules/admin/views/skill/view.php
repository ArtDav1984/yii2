<?php
	
use yii\helpers\Html;
use yii\helpers\Url;

 
	
	$this->title = 'View';
	\yii\web\YiiAsset::register($this);

?>
<div class="breadcrumbs">
	<ol class="breadcrumb">
		<li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
		<li><a href="<?= Url::to(['/admin/skill/index']) ?>">Skills</a></li>
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
			<td><?= $skill->id; ?></td>
		</tr>
		<tr>
			<td><b>Skill Name</b></td>
			<td><?= $skill->name; ?></td>
		</tr>
        <tr>
            <td><b>Brand</b></td>
            <td><?= Html::img(Url::to('@web/uploads/skills/'.$skill->image), ['class' => 'skill_image']) ?></td>
        </tr>
	</table>

</div>