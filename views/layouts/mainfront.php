<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\FrontAsset;

FrontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="show-spinner">
<?php $this->beginBody() ?>
<?php 
    $loginid = \Yii::$app->util->loggedinUserId();
    if (isset($loginid)) 
    {
       $user=\app\models\User::find()->where(['id'=>$loginid])->one();
        $userdtails=\app\models\UserDetails::find()->where(['user_id'=>$loginid])->one();
        if (!empty($user)) 
        {
            $authassign=\app\models\AuthAssignment::find()->where(['user_id'=>$loginid])->one();
        } 
    }
     
?>
    <div class="landing-page">
    <div class="mobile-menu">
      <a href="<?=url::to(['/'])?>" class="logo-mobile">
        <span></span>
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?=url::to(['/'])?>">Home</a>
        </li>
        
        <li class="nav-item">
          <a href="<?=url::to(['site/pricing'])?>">Princing</a>
        </li>
        <li class="nav-item">
          <a href="<?=url::to(['site/about'])?>">About</a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?=url::to(['site/contact'])?>">Contact</a>
        </li>
        <li class="nav-item">
          <div class="separator"></div>
        </li>
        <?php if (Yii::$app->user->isGuest)  {?>
        <li class="nav-item mt-2">
          <a href="<?=url::to(['site/login'])?>">SIGN IN</a>
        </li>
        <li class="nav-item">
          <a href="<?=url::to(['site/register'])?>">SIGN UP</a>
        </li>
        <?php } else{ ?>
        <li class="nav-item">
          <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $userdtails->name ?>
            </a>
            <div class="dropdown-menu">
              <?php if(\Yii::$app->user->can('admin')){ ?>
              <a class="dropdown-item" href="<?=url::to(['site/admin'])?>">Dashboard</a>
              <?php } elseif(\Yii::$app->user->can('user')){ ?>
              <a class="dropdown-item" href="<?=url::to(['site/dasboard'])?>">Dashboard</a>
              <?php } ?>
              <a class="dropdown-item" href="<?=url::to(['site/logout'])?>">Logout</a>
            </div>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
    <div class="main-container">
      <nav class="landing-page-nav">
        <div class="container d-flex align-items-center justify-content-between">
          <a class="navbar-logo pull-left" href="<?=url::to(['/'])?>">
            <span class="white"></span>
            <span class="dark"></span>
          </a>
          <ul class="navbar-nav d-none d-lg-flex flex-row">
            <li class="nav-item">
              <a href="<?=url::to(['/'])?>">Home</a>
            </li>
            <!-- <li class="nav-item ">
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  LEARN
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="LandingPage.Docs.html">DOCS</a>
                  <a class="dropdown-item" href="LandingPage.Videos.html">VIDEOS</a>
                  <a class="dropdown-item" href="LandingPage.Contact.html">HELP</a>
                </div>
              </div>
            </li> -->
            <li class="nav-item">
              <a href="<?=url::to(['site/pricing'])?>">Princing</a>
            </li>
            <li class="nav-item">
              <a href="<?=url::to(['site/about'])?>">About</a>
            </li>
            <li class="nav-item">
              <a href="<?=url::to(['site/contact'])?>">Contact</a>
            </li>
            <?php if (Yii::$app->user->isGuest)  {?>
            <li class="nav-item mr-3">
              <a href="<?=url::to(['site/login'])?>">SIGN IN</a>
            </li>
            <li class="nav-item pl-2">
              <a class="btn btn-outline-semi-light btn-sm pr-4 pl-4" href="<?=url::to(['site/register'])?>">SIGN
                UP</a>
            </li>
            <?php } else{ ?>
            <li class="nav-item pl-2">
              <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-outline-semi-light btn-sm pr-4 pl-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $userdtails->name ?>
                </a>
                <div class="dropdown-menu">
                  <?php if(\Yii::$app->user->can('admin')){ ?>
                  <a class="dropdown-item" href="<?=url::to(['site/admin'])?>">Dashboard</a>
                  <?php } elseif(\Yii::$app->user->can('user')){ ?>
                  <a class="dropdown-item" href="<?=url::to(['site/dasboard'])?>">Dashboard</a>
                  <?php } ?>
                  <!-- <a class="dropdown-item" href="LandingPage.Videos.html">Courses</a> -->
                  <a class="dropdown-item" href="<?=url::to(['site/logout'])?>">Logout</a>
                </div>
              </div>
            </li>
            <!-- <li class="nav-item pl-2">
              <a class="btn btn-outline-semi-light btn-sm pr-4 pl-4" href="<?=url::to(['site/logout'])?>">LOGOUT</a>
            </li> -->
            <?php } ?>
          </ul>
          <a href="#" class="mobile-menu-button">
            <i class="simple-icon-menu"></i>
          </a>
        </div>
      </nav>
      <div class="content-container" id="home">
<?= \odaialali\yii2toastr\ToastrFlash::widget([
    'options' => [
      'positionClass' => 'toast-top-right',
      
    ]
]);?>

      <?= $content ?>

        <div class="section background background-no-bottom mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                        <h1>Newsletter</h1>
                        <p>
                            To receive our newsletter please complete the form below. We take your privacy
                            seriously and we will not share your information with others. You can unsubscribe
                            at any time.
                        </p>
                    </div>

                    <div class="col-12 offset-0 col-lg-6 offset-lg-3 newsletter-input-container">
                      <form method="POST" action="/site/subcribe">
                         <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                          <div class="input-group mb-3">
                              <input type="text" class="form-control" name="email" placeholder="E-mail address">
                              <div class="input-group-append">
                                  <button class="btn btn-secondary btn-xl" type="submit">JOIN</button>
                              </div>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="section footer mb-0">
          <div class="container">
            <div class="row footer-row">
              <div class="col-12 text-right">
                <a class="btn btn-circle btn-outline-semi-light footer-circle-button scrollTo" href="#home" id="footerCircleButton"><i
                    class="simple-icon-arrow-up"></i></a>
              </div>
              <div class="col-12 text-center footer-content">
                <a href="<?=url::to(['/'])?>">
                  <img class="footer-logo" alt="footer logo" src="/img/logo.png" />
                </a>
              </div>
            </div>
            <div class="row" id="footerMenuAccordion">
              <div class="col-12 col-xs-6 col-sm-3 offset-0 col-lg-2 offset-lg-2 footer-menu mb-5">
                <div class="d-flex flex-column align-items-center">
                  <a href="#" class="d-inline-block d-xs-none collapse-button mb-1" data-toggle="collapse" data-target="#menuGroup1"
                    aria-expanded="true">COMPANY <i class="simple-icon-arrow-down"></i></a>
                  <ul class="list-unstyled footer-menu collapse d-xs-block mb-0" id="menuGroup1" data-parent="#footerMenuAccordion">
                    <li class="d-none d-xs-inline-block">
                      <p>COMPANY</p>
                    </li>
                    <li><a href="<?=url::to(['site/about'])?>">About</a></li>
                    <!-- <li><a href="LandingPage.Blog.html">Blog</a></li>
                    <li><a href="LandingPage.Careers.html">Careers</a></li> -->
                    <li><a href="<?=url::to(['site/contact'])?>">Contact</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-12 col-xs-6 col-sm-3 col-lg-2 footer-menu mb-5">
                <div class="d-flex flex-column align-items-center">
                  <a href="#" class="d-inline-block d-xs-none collapse-button mb-1" data-toggle="collapse" data-target="#menuGroup2"
                    aria-expanded="true">PRODUCT <i class="simple-icon-arrow-down"></i></a>
                  <ul class="list-unstyled footer-menu collapse d-xs-block  mb-0" id="menuGroup2" data-parent="#footerMenuAccordion">
                    <li class="d-none d-xs-inline-block">
                      <p>PRODUCT</p>
                    </li>
                    <!-- <li><a href="LandingPage.Features.html">Features</a></li> -->
                    <li><a href="<?=url::to(['site/pricing'])?>">Pricing</a></li>
                    <!-- <li><a href="LandingPage.Docs.html">Api</a></li>
                    <li><a href="LandingPage.Docs.html">Enterprise</a></li> -->
                  </ul>
                </div>
              </div>

              <div class="col-12 col-xs-6 col-sm-3 col-lg-2 footer-menu mb-5">
                <div class="d-flex flex-column align-items-center">
                  <a href="#" class="d-inline-block d-xs-none collapse-button mb-1" data-toggle="collapse" data-target="#menuGroup3"
                    aria-expanded="true">LEARNING <i class="simple-icon-arrow-down"></i></a>
                  <ul class="list-unstyled footer-menu collapse d-xs-block mb-0" id="menuGroup3" data-parent="#footerMenuAccordion">
                    <li class="d-none d-xs-inline-block">
                      <p>LEARNING</p>
                    </li>
                    <li><a href="<?=url::to(['site/contact'])?>">Help</a></li>
                    <li><a href="<?=url::to(['site/login'])?>">Quick Start</a></li>
                    <!-- <li><a href="LandingPage.Docs.html">Docs</a></li> -->
                    <!-- <li><a href="LandingPage.Videos.html">Videos</a></li> -->
                  </ul>
                </div>
              </div>

              <div class="col-12 col-xs-6 col-sm-3 col-lg-2 footer-menu mb-5">
                <div class="d-flex flex-column align-items-center">
                  <a href="#" class="d-inline-block d-xs-none collapse-button mb-1" data-toggle="collapse" data-target="#menuGroup4"
                    aria-expanded="true">LEGAL <i class="simple-icon-arrow-down"></i></a>
                  <ul class="list-unstyled footer-menu collapse d-xs-block mb-0" id="menuGroup4" data-parent="#footerMenuAccordion">
                    <li class="d-none d-xs-inline-block">
                      <p>LEGAL</p>
                    </li>
                    <li><a href="<?=url::to(['site/privacy'])?>">Privacy</a></li>
                    <li><a href="<?=url::to(['site/privacy'])?>">Terms and Conditions</a></li>
                    <li><a href="<?=url::to(['site/privacy'])?>">Cookies</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="separator mt-5"></div>
          <div class="container copyright pt-5 pb-5">
            <div class="row">
              <div class="col-12"></div>
              <div class="col-6">
                <p class="mb-0">2018 © ColoredStrategies</p>
              </div>
              <div class="col-6 text-right social-icons">
                <ul class="list-unstyled list-inline">
                  <li class="list-inline-item">
                    <a href="#"><i class="simple-icon-social-facebook"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><i class="simple-icon-social-twitter"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><i class="simple-icon-social-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>



      </div>
  </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<style type="text/css">
    .landing-page .landing-page-nav .navbar-logo .white, .landing-page .landing-page-nav .navbar-logo .dark ,.landing-page .logo-mobile span
    {
        background: url("../../img/logo.png") !important;
    }
    .landing-page .landing-page-nav.headroom--not-top.headroom--pinned {
        background: #CDDC39 !important;
    }
</style>