<?php

use yii\helpers\Html;

$this->title = 'Create Development';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/development/index">Developments</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="development-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('development', 'skillsList', 'employeesList')) ?>

</div>
