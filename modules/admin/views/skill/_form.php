<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<div class="skill-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($skill, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($skill, 'image')->fileInput() ?>

    <?=  Html::img(Url::to('@web/uploads/skills/'.$skill->image), ['class' => 'skill_image']) ?>
    <br><br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
