<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="login">
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <h1><?= Html::encode($this->title) ?></h1>
        
            <?php $form = ActiveForm::begin(); ?>
                
                <?= $form->field($model, 'username')->textInput() ?>
        
                <?= $form->field($model, 'password')->passwordInput() ?>
        
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
        
                <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
        
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
