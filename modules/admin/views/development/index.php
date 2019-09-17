<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Developments';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="development-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Development', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>Items: <?= count($developments); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID</th>
            <th>Skills</th>
            <th>Employees</th>
            <th colspan="3">Operations</th>
        </tr>
		<?php foreach ($developments as $item): ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->skills['name']; ?></td>
                <td><?php echo $item->employees['first_name'].' '.$item->employees['last_name']; ?></td>
                <td><?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $item['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $item['id']]) ?></td>
                <td><?= Html::a('<i class="fa fa-times"></i>', ['delete', 'id' => $item['id']], [   'data' => [
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
