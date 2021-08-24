<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" type="text/css" href="../../css/vendor/bootstrap-float-label.min.css" >

<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        24/7 Free Support
                    </div>
                    <p class="white mb-5">
                        Capitalize on low hanging fruit to identify a ballpark value added activity to
                        beta test. Override low hanging fruit to identify a ballpark the digital divide
                        with additional clickthroughs from DevOps.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-circle btn-outline-semi-light hero-circle-button scrollTo" href="#content" id="homeCircleButton"><i
            class="simple-icon-arrow-down"></i></a>
</div>

<div class="section">
    <div class="container" id="content">
        <div class="row">
            <div class="col-12 col-lg-7">
                <h2>Contact Form</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/site/contact">
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                            <label class="form-group has-top-label">
                                <input class="form-control" placeholder="" name="name" />
                                <span>NAME</span>
                            </label>

                            <label class="form-group has-top-label">
                                <input class="form-control" name="mobile" />
                                <span>Mobile</span>
                            </label>
                            <label class="form-group has-top-label">
                                <input class="form-control" name="email" />
                                <span>E-MAIL</span>
                            </label>
                            <label class="form-group has-top-label">
                                <input class="form-control" name="subject" />
                                <span>Subject</span>
                            </label>

                            <label class="form-group has-top-label">
                                <textarea class="form-control" rows="4" name="message"></textarea>
                                <span>MESSAGE</span>
                            </label>

                            <!-- <a href="#" class="btn btn-primary btn-multiple-state float-right" id="contactButton">
                                <div class="spinner d-inline-block">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>
                                <span class="icon success" data-toggle="tooltip" data-placement="top"
                                    title="Message sent successfully!">
                                    <i class="simple-icon-check"></i>
                                </span>
                                <span class="icon fail" data-toggle="tooltip" data-placement="top"
                                    title="Something went wrong!">
                                    <i class="simple-icon-exclamation"></i>
                                </span>
                                <span class="label ">Send</span>
                            </a> -->
                            <input type="submit" name="btncontact" value="SEND" class="btn btn-primary btn-multiple-state float-right">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 offset-lg-1 side-bar">
                <h2>Contact Info</h2>

                <p class="text-primary mb-2">Address</p>
                <p class="mb-5">35 Little Russell St Bloomsbury London<br />WC1A 2HH UK</p>

                <p class="text-primary mb-2">Phone</p>
                <p class="mb-0">+00 42 287 2686</p>
                <p class="mb-5">+00 42 287 2685</p>

                <p class="text-primary mb-2">E-mail</p>
                <p class="mb-0">info@woodentoys.com</p>

            </div>
        </div>
    </div>
</div>