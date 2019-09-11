<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\jobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jobcategoryid')->textInput() ?>

    <?= $form->field($model, 'courseid')->textInput() ?>

    <?= $form->field($model, 'jobname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timefrom')->textInput() ?>

    <?= $form->field($model, 'timeto')->textInput() ?>

    <?= $form->field($model, 'period')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contactperson')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'persons')->textInput() ?>

    <?= $form->field($model, 'persons_found')->textInput() ?>

    <?= $form->field($model, 'alert')->textInput() ?>

    <?= $form->field($model, 'notification_alert')->textInput() ?>

    <?= $form->field($model, 'urgent')->textInput() ?>

    <?= $form->field($model, 'urgentmessage')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'repeat')->textInput() ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'completed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
