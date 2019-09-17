<?php

use yii\helpers\Html;

$this->title = 'Update Development: ' . $development->id;

?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/development/index">Developments</a></li>
        <li class="active">Update</li>
    </ol>
</div>
<div class="development-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('development', 'skillsList', 'employeesList')) ?>

</div>
