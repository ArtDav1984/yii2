<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Employee */

$this->title = $employee['id'];
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $employee['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $employee['id']], [
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
            <td><?php echo $employee['id']; ?></td>
        </tr>
        <tr>
            <td><b>Company</b></td>
            <td><?php echo $employee['companies']['name']; ?></td>
        </tr>
        <tr>
            <td><b>Department</b></td>
            <td><?php echo $employee['departments']['name']; ?></td>
        </tr>
        <tr>
            <td><b>First Name</b></td>
            <td><?php echo $employee['first_name']; ?></td>
        </tr>
        <tr>
            <td><b>Last Name</b></td>
            <td><?php echo $employee['last_name']; ?></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><?php echo $employee['email']; ?></td>
        </tr>
        <tr>
            <td><b>Address</b></td>
            <td><?php echo $employee['address']; ?></td>
        </tr>
        <tr>
            <td><b>Phone Number</b></td>
            <td><?php echo $employee['phone_number']; ?></td>
        </tr>
    </table>

</div>
