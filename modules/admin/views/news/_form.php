<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($news, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($news, 'body')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
