<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Update Skill: ' . $skill->name;
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/skill/index']) ?>">Skills</a></li>
        <li class="active">Update</li>
    </ol>
</div>
<div class="skill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('skill')) ?>

</div>
