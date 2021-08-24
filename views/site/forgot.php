<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .form-group {
    margin-bottom: 0rem;
    width: 100% !important;
}
.col-sm-6 {
    flex: 0 0 50%;
    max-width: 100% !important;
}
</style>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="/assets/images/proqaz_1.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Forgot</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'layout' => 'horizontal',
                                'class'=>"form-horizontal m-t-20",
                                'action'=>'/site/forgot',
                                'method'=>'POST'
                            ]); ?>
                            <!-- email -->
                            <div class="form-group row">
                                <div class="input-group mb-6">
                                    <?= $form->field($model, 'username')->textInput(['disabled' => true,'aria-label'=>"User Name", 'aria-describedby'=>"basic-addon1"])->label(false) 
                                    ?>
                                </div>
                                <div class="input-group mb-6">
                                    <?= $form->field($model, 'email')->textInput(['disabled' => true,'aria-label'=>"Email", 'aria-describedby'=>"basic-addon1"])->label(false) 
                                    ?>
                                </div>
                                <div class="input-group mb-6">
                                     <?= $form->field($model, 'password_hash')->textInput(['value' => '','autofocus' => true ,'aria-label'=>"password",'placeholder'=>"New Password", 'aria-describedby'=>"basic-addon1"])->label(false)->passwordInput() ?>
                                </div>
                                <div class="input-group mb-6">
                                    <?= $form->field($model, 'password_repeat')->textInput(['value' => '','autofocus' => true ,'aria-label'=>"password",'placeholder'=>"Repeat New Password", 'aria-describedby'=>"basic-addon1"])->label(false)->passwordInput() ?>
                                </div>


                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
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