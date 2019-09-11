<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>Items: <?= count($employees); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID </th>
            <th>Company</th>
            <th>Department</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th colspan="3"></th>
        </tr>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee['companies']['name']; ?></td>
                <td><?php echo $employee['departments']['name']; ?></td>
                <td><?php echo $employee['first_name']; ?></td>
                <td><?php echo $employee['last_name']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td><?php echo $employee['address']; ?></td>
                <td><?php echo $employee['phone_number']; ?></td>
                <td><?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $employee['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $employee['id']]) ?></td>
                <td><?= Html::a('<i class="fa fa-times"></i>', ['delete', 'id' => $employee['id']], [   'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>
