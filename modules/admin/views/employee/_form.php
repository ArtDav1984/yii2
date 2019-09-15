<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companies_id')
             ->dropDownList($companiesList, ['id' => $model->companies['id']]); ?>

    <?= $form->field($model, 'departments_id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?php $birthday = !is_null($model->birthday) ? date('M j, Y', strtotime($model->birthday)) : ''; ?>

    <?= $form->field($model, 'age')
    ->widget(DatePicker::className(), [
        'language' => 'en',
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
            'dateFormat' => 'yyyy/MM/dd',
            'yearRange' => '1950:2020',
        ]
    ])->textInput(['class' => 'form-control', 'readonly' => true, 'value' => $birthday]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
