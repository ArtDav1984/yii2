<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

?>

<div class="salary-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($salary, 'employees_id')
	         ->dropDownList($employeesList, ['id' => $salary->employees['id']]);
	?>
	
	<?php $created_at = !is_null($salary->created_at) ? date('M j, Y', strtotime($salary->created_at)) : ''; ?>
	
	<?= $form->field($salary, 'created_at')
	         ->widget(DatePicker::className(), [
		         'language' => 'en',
		         'clientOptions' => [
			         'changeMonth' => true,
			         'changeYear' => true,
			         'dateFormat' => 'yyyy/MM/dd',
			         'yearRange' => '2010:2050',
		         ]
	         ])->textInput(['class' => 'form-control', 'readonly' => true, 'value' => $created_at]) ?>

    <?= $form->field($salary, 'salary')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
