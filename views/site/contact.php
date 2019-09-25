<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha;
	
	$this->title = 'Contact';
?>
<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            <li><a href="<?= Url::to(['/']) ?>">Home</a></li>
            <li>Contact</li>
        </div>
    </div>
</div>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.9073178837043!2d43.835547711795115!3d40.78605168073818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4041fbed15cdb0cb%3A0xea64b7ee5515c5de!2sGyumri%20Technology%20Center!5e0!3m2!1sru!2s!4v1569411058322!5m2!1sru!2s"  width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<section id="contact-page">
    <div class="container">
        <div class="center">
            <h2>Drop Your Message</h2>
        </div>
        <div class="row contact-wrap">
            <div class="col-md-6 col-md-offset-3">
				<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success">
                        Thank you for contacting us. We will respond to you as soon as possible.
                    </div>

                    <p>
                        Note that if you turn on the Yii debugger, you should be able
                        to view the mail message on the mail panel of the debugger.
						<?php if (Yii::$app->mailer->useFileTransport): ?>
                            Because the application is in development mode, the email is not sent but saved as
                            a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                                                                                                                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                            application component to be false to enable email sending.
						<?php endif; ?>
                    </p>
				
				<?php else: ?>

                    <p>
                        If you have business inquiries or other questions, please fill out the following form to contact us.
                        Thank you.
                    </p>
							
							<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
							
							<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
							
							<?= $form->field($model, 'email') ?>
							
							<?= $form->field($model, 'subject') ?>
							
							<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
							
							<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
								'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
							]) ?>

                            <div class="form-group">
								<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                            </div>
							
							<?php ActiveForm::end(); ?>
       
				
				<?php endif; ?>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>
<!--/#contact-page-->


