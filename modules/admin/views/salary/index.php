<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Salaries';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="salary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Salary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>Items: <?= count($salaries); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID</th>
            <th>Create AT</th>
            <th>Salary</th>
            <th>Employees</th>
            <th colspan="3">Operations</th>
        </tr>
		<?php foreach ($salaries as $salary): ?>
            <tr>
                <td><?php echo $salary->id; ?></td>
                <td><?php echo $salary->create_at; ?></td>
                <td><?php echo $salary->salary; ?></td>
                <td><?php echo $salary->employees['first_name'].' '.$salary->employees['last_name']; ?></td>
                <td> <?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $salary['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $salary['id']]) ?></td>
                <td><?= Html::a('<i class="fa fa-times"></i>', ['delete', 'id' => $salary['id']], [   'data' => [
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
