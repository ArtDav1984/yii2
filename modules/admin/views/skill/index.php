<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Skills';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="skill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Skill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>Items: <?= count($skills); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID</th>
            <th>Skill Name</th>
            <th colspan="3">Actions</th>
        </tr>
		<?php foreach ($skills as $skill): ?>
            <tr>
                <td><?php echo $skill->id; ?></td>
                <td><?php echo $skill->name; ?></td>
                <td> <?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $skill['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $skill['id']]) ?></td>
                <td><?= Html::a('<i class="fa fa-times"></i>', ['delete', 'id' => $skill['id']], [   'data' => [
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
