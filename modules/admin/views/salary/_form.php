<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

?>

<div class="salary-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($salary, 'employees_id')
	         ->dropDownList($employeesList, ['id' => $salary->employees['id']]); ?>
	
	<?php $create_at = !is_null($salary->create_at) ? date('M j, Y', strtotime($salary->create_at)) : ''; ?>
	
	<?= $form->field($salary, 'create_at')
	         ->widget(DatePicker::className(), [
		         'language' => 'en',
		         'clientOptions' => [
			         'changeMonth' => true,
			         'changeYear' => true,
			         'dateFormat' => 'yyyy/MM/dd',
			         'yearRange' => '2019:2050',
		         ]
	         ])->textInput(['class' => 'form-control', 'readonly' => true, 'value' => $create_at]) ?>

    <?= $form->field($salary, 'salary')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
