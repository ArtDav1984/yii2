<?php

use yii\helpers\Html;

$this->title = 'Create Skill';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/skill/index">Skills</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="skill-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('skill')); ?>

</div>
