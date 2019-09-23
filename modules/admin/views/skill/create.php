<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Create Skill';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/skill/index']) ?>">Skills</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="skill-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('skill')); ?>

</div>
