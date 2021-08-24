<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\checkbox\CheckboxX;

$this->title = 'Forget Password';
?>
		 <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side text-center " style="    text-shadow: 1px 1px 2px #28262d;">

                            <p class=" text-white h2">SIGN IN </p>

                            <p class="white mb-0 text-center">
                               Hi Welcome to the ALTNT Support Portal we glad to inform you will help you to focus on your study. Please Enter Your Detail To Login.<br>
								
                               
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="<?=url::to(['/'])?>">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4" style="margin-left: 4%;
    font-size: 20px;">Login</h6>
                            <?php $form = ActiveForm::begin([
				'id' => 'forget-password-email-form',
				'options' =>['class' =>'sign-box'],
				
				'scrollToError' =>  true
			]); ?>
				
				<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

				<div class="form-group pull-right">
					<!--<div class="col-lg-offset-1 col-lg-11">-->
					<div class="">
						<?= Html::submitButton('Forget Password', ['class' => 'btn btn-success btn-lg', 'name' => 'login-button']) ?>
					</div>
				</div>

			<?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<style type="text/css">
    .logo-single
    {
        background: url(/img/logo.png) no-repeat;
        
    width: 140px;
    }
	.bootstrap-tagsinput, .form-control {
    border-radius: 0.1rem;
    outline: initial!important;
    box-shadow: none!important;
    font-size: 24px;
    min-height: 32px;
    height: 53px;
    /* padding: .75rem .75rem .5rem; */
    /* line-height: 72px; */
    border: 2px solid #145388;
    background: #14;
    color: #145388 !important;
    2121: ;
}
.has-float-label label, .has-float-label > span:last-of-type {
    position: absolute;
    cursor: text;
    font-size: 15px !important;
    opacity: 1;
    top: -0.4em;
    left: 1.75rem !important;
    z-index: 3;
    line-height: 1;
    padding: 0 1px;
}
button{
	border-radius: 2px !important;
    margin-right: 16px !important;
    font-size: 19px !important;
    border: solid 2px !important;
}
.required , .has-error{
	color: red !important;
}
.auth-card {
    display: flex;
    flex-direction: row;
    box-shadow: 1px 2px 1px 3px rgb(236, 234, 234), 0 1px 6px rgb(222, 217, 217) !important;
}
</style>