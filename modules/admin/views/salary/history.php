<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'History';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/salary/index']) ?>">Salaries</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID</th>
            <th>Created AT</th>
            <th>Salary</th>
            <th>Employee</th>
            <th>Action</th>
        </tr>
        <?php foreach ($salariesHistory as $salaryHistory): ?>
            <tr>
                <td><?= $salaryHistory->id; ?></td>
                <td><?= $salaryHistory->created_at; ?></td>
                <td><?= $salaryHistory->salary; ?></td>
                <td><?= $salaryHistory->employees['first_name'].' '.$salaryHistory->employees['last_name']; ?></td>
                <td><?= Html::a('Delete', ['delete', 'id' => $salaryHistory['id']],
                                               ['class' => 'btn btn-danger'],
                                               [   'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= LinkPager::widget([
        'pagination' => $pagination,
    ]); ?>


</div>


















