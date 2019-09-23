<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Salaries';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="salary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Salary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>Count: <?= count($salaries); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID</th>
            <th>Created AT</th>
            <th>Salary</th>
            <th>Employees</th>
            <th colspan="3">Actions</th>
        </tr>
		<?php foreach ($salaries as $salary): ?>
            <tr>
                <td><?= $salary->id; ?></td>
                <td><?= $salary->created_at; ?></td>
                <td><?= $salary->salary; ?></td>
                <td><?= $salary->employees['first_name'].' '.$salary->employees['last_name']; ?></td>
                <td> <?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $salary['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $salary['id']]) ?></td>
                <td> <?= Html::a('History', ['history', 'id' => $salary->employees['id']],
                                                 ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
		<?php endforeach; ?>
    </table>
	
	<?= LinkPager::widget([
		'pagination' => $pagination,
	]); ?>


</div>
