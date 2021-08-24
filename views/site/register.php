<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Url;
use app\models\User;
use kartik\widgets\FileInput;

$this->title = 'SIGN UP';
$this->params['breadcrumbs'][] = $this->title;
?>
    <main>
        <div class="container">
            <div class="row h-100" style="    padding: 44px;">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side text-center " style="    text-shadow: 1px 1px 2px #28262d;">

                            <p class=" text-white h2">Welcome </p>

                            <p class="white mb-0">
                                Please use your credentials to Start Your Free Trial.
                                <br>If you are already a member, please
                                <a href="<?=url::to(['site/login'])?>" class="white"> Login Here</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="<?=url::to(['/'])?>">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4" style="margin-left: 4%;
    font-size: 20px;">Register</h6>
                        <?php
                          $form = ActiveForm::begin([
                            'id' => 'parents-login-form',
                            'class'=>'cmxform',
                            'enableClientValidation' => true,
                          ]);
                        ?>
                                <label class="form-group has-float-label mb-4">
                                    <?= $form->field($userDetailsModel, 'name')->textInput(['maxlength' => true , 'placeholder'=>'Enter Your Full Name'])->label(false) ?>
                                    <span>Full Name</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true , 'placeholder'=>'Enter Your Valid Email'])->label(false) ?>
                                    <span>Email</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true , 'placeholder'=>'Enter Your Username'])->label(false) ?>
                                    <span>Username</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'password_hash')->passwordInput(['placeholder'=>'Enter Password'])->label(false) ?>
                                    <span>Password</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder'=>'Confirm Password'])->label(false) ?>
                                    <span>Confirm Password</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'reCaptcha')->widget(
                                          \himiklab\yii2\recaptcha\ReCaptcha::className()
                                        )->label(false); ?>
                                    <!-- <span>Confirm Password</span> -->
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                
                                      <?= Html::submitButton('Register', ['class' => 'btn btn-outline-primary btn-lg btn-shadow', 'name' => 'login-button']) ?>
                                    <!-- <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button> -->
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
    }
	.bootstrap-tagsinput, .form-control {
    border-radius: 0.1rem;
    outline: initial!important;
    box-shadow: none!important;
    font-size: 14px;
    min-height: 20px;
    height: 53px;
    /* padding: .75rem .75rem .5rem; */
    /* line-height: 72px; */
    border: 1px solid;
    background: #14;
    color: #145388 !important;
  
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
.auth-card .form-side {
    width: 60%;
    padding: 49px;
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