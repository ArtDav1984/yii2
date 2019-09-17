<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="skill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($skill, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
