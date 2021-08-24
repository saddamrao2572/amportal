<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\checkbox\CheckboxX;

$this->title = 'Login';
?>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Reset Password</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">

			<?php $form = ActiveForm::begin([
				'id' => 'forget-password-form',
				'options' =>['class' =>'sign-box'],
				'scrollToError' =>  true
			]); ?>
				<?= $form->field($model, 'new_password')->passwordInput() ?>
				
				<?= $form->field($model, 'password_repeat')->passwordInput() ?>

				<div class="form-group">
					<!--<div class="col-lg-offset-1 col-lg-11">-->
					<div class="">
						<?= Html::submitButton('Forget Password', ['class' => 'pull-right btn btn-primary btn-lg', 'name' => 'login-button']) ?>
					</div>
				</div>

			<?php ActiveForm::end(); ?>
		<div class="form-group m-b-0 m-t-10">
                                <div class="col-sm-12 text-center">
                                    Don't have an account? <a href="<?= Url::to(['/site/register']) ?>" class="text-info m-l-5"><b>Sign Up</b></a>
                                </div>
                            </div>
                            <div class="form-group m-b-0 m-t-10">
                                <div class="col-sm-12 text-center">
                                    Already have an account? <a href="<?= Url::to(['/site/login']) ?>" class="text-info m-l-5"><b>Sign IN</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>