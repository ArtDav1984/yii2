<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="development-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($development, 'employees_id')
	         ->dropDownList($employeesList, ['id' => $development->employees['id']])?>

    <?= $form->field($development, 'skills_id')->checkboxList($skillsList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
