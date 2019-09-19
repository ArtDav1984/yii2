<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use \roboapp\multiselect\MultiSelect;

?>

<div class="employee-form">
    
    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($employee, 'companies_id')
	         ->dropDownList($companiesList, ['prompt' => 'All Companies', 'id' => $employee->companies['id']]); ?>

	<?= $form->field($employee, 'departments_id')
	         ->dropDownList($departmentsList, ['prompt' => 'All Departments', 'id' => $employee->departments['id']]); ?>

    <?php
        $value = [];
        $i = 1;
        foreach ($employeesSkill as $item) {
            if (count($item) > 0) {
                $value[$i] = $item->skills_id;
                $i++;
            }
        }
    ?>
	<?= MultiSelect::widget([
        'options' => [
            'multiple' => true,
            'class' => 'form-control'
        ],
        'value' => $value, // or ['value_1', 'value_3']
        'name' => 'skills_id',
        'data' => $skillsList
    ])
	?>

	<?= $form->field($employee, 'first_name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($employee, 'last_name')->textInput(['maxlength' => true]) ?>
 
	<?php $birthday = !is_null($employee->birthday) ? date('M j, Y', strtotime($employee->birthday)) : ''; ?>
	
	<?= $form->field($employee, 'birthday')
	         ->widget(DatePicker::className(), [
		         'language' => 'en',
		         'clientOptions' => [
			         'changeMonth' => true,
			         'changeYear' => true,
			         'dateFormat' => 'yyyy/MM/dd',
			         'yearRange' => '1950:2020',
		         ]
	         ])->textInput(['class' => 'form-control', 'readonly' => true, 'value' => $birthday]) ?>

	<?= $form->field($employee, 'gender')->radioList( ['male' => 'male', 'female' => 'female'] ); ?>

    <?= $form->field($employee, 'city')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($employee, 'address')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($employee, 'phone_number')->textInput() ?>
	
	<?= $form->field($employee, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
