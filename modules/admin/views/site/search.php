<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */

$this->title = 'Employees';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-index">

    <?php if (!empty($employees)) : ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Search Result: <?= count($employees); ?></p>

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
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['/admin/employee/update', 'id' => $employee['id']]) ?></td>
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

    <?php else: ?>

    <h2>No Result</h2>

    <?php endif; ?>

</div>
