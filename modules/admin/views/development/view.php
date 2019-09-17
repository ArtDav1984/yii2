<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'View';
\yii\web\YiiAsset::register($this);
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/development/index">Developments</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="development-view">

    <h1><?= Html::encode($development->skills['name'].':
                         '.$development->employees['first_name'].' '.$development->employees['last_name']) ?>
    </h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $development->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $development->id], [
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
            <td><?php echo $development->id; ?></td>
        </tr>
        <tr>
            <td><b>Skills</b></td>
            <td><?php echo $development->skills['name']; ?></td>
        </tr>
        <tr>
            <td><b>Employees</b></td>
            <td><?php echo $development->employees['first_name'].' '.$development->employees['last_name']; ?></td>
        </tr>
    </table>

</div>
