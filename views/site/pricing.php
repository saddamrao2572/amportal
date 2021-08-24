<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
/* @var $this yii\web\View */

// $this->title = 'My Yii Application';]

$this->title = 'Pricing Details';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        Prices for Every Budget
                    </div>
                    <p class="white mb-5">
                        Distinctively exploit optimal alignments for intuitive bandwidth. Quickly
                        coordinate e-business applications through catalysts for change.
                        Seamlessly underwhelm optimal processes.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-circle btn-outline-semi-light hero-circle-button scrollTo" href="#content" id="homeCircleButton"><i
            class="simple-icon-arrow-down"></i></a>
</div>

<div class="section mb-0">
    <div class="container" id="content">
        <div class="row row-eq-height price-container">

            <div class="col-md-12 col-lg-4 mb-4 price-item">
                <div class="card">
                    <div class="card-body pt-5 pb-5 d-flex flex-lg-column flex-md-row flex-sm-row flex-column">
                        <div class="price-top-part">
                            <i class="iconsmind-Male large-icon"></i>
                            <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">DEVELOPER</h5>
                            <p class="text-large mb-2 text-default">$11</p>
                            <p class="text-muted text-small">User/Month</p>
                        </div>
                        <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column">
                            <ul class="list-unstyled">
                                <li>
                                    <p class="mb-0 ">
                                        Number of end products 1
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Two factor authentication
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Free updates
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Forum support
                                    </p>
                                </li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-link btn-empty btn-lg">PURCHASE <i class="simple-icon-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 mb-4 price-item">
                <div class="card">
                    <div class="card-body pt-5 pb-5 d-flex flex-lg-column flex-md-row flex-sm-row flex-column">
                        <div class="price-top-part">
                            <i class="iconsmind-MaleFemale large-icon"></i>
                            <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">TEAM</h5>
                            <p class="text-large mb-2 text-default">$17</p>
                            <p class="text-muted text-small">User/Month Up to 10 Users</p>
                        </div>
                        <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column">
                            <ul class="list-unstyled">
                                <li>
                                    <p class="mb-0 ">
                                        24/5 support
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Number of end products 1
                                    </p>
                                </li>

                                <li>
                                    <p class="mb-0 ">
                                        Two factor authentication
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Free updates
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Forum support
                                    </p>
                                </li>
                            </ul>
                            <div>
                                <a href="#" class="btn btn-link btn-empty btn-lg">PURCHASE <i class="simple-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 mb-4 price-item">
                <div class="card">
                    <div class="card-body pt-5 pb-5 d-flex flex-lg-column flex-md-row flex-sm-row flex-column">
                        <div class="price-top-part">
                            <i class="iconsmind-Mens large-icon"></i>
                            <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">ENTERPRISE</h5>
                            <p class="text-large mb-2 text-default">$19</p>
                            <p class="text-muted text-small">User/Month 10+ Users</p>
                        </div>
                        <div class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex price-feature-list flex-column">
                            <ul class="list-unstyled">
                                <li>
                                    <p class="mb-0 ">
                                        24/7 support
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Number of end products 1
                                    </p>
                                </li>

                                <li>
                                    <p class="mb-0 ">
                                        Two factor authentication
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Free updates
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0 ">
                                        Forum support
                                    </p>
                                </li>
                            </ul>

                            <div>
                                <a href="#" class="btn btn-link btn-empty btn-lg">PURCHASE <i class="simple-icon-arrow-right"></i></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                <h1>Feature Comparison</h1>
                <p>
                    Well, no need to brood on what tomorrow may bring. For one thing, tomorrow will be
                    certain to bring worse than today, for many days to come. And there is nothing more
                    that I can do to help it. The board is set, and the pieces are moving.
                </p>
            </div>
        </div>

        <div class="row feature-row">

            <!-- For large screens -->
            <div class="d-none d-md-block col-12">
                <div class="card d-flex flex-row mb-3 table-heading">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <p class="list-item-heading mb-0 truncate w-40 w-xs-100"></p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">DEVELOPER</p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">TEAM</p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">ENTERPRISE</p>
                        </div>
                    </div>
                </div>

                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                Two factor authentication
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                Team permissions
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">

                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                24/5 Support
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">

                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                24/7 Support
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">

                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">

                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <p class="list-item-heading mb-0 truncate w-40 w-xs-100">
                                User actions audit log
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">

                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                            </p>
                            <p class="mb-0 text-primary w-20 w-xs-100 text-center">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>

            </div>


            <!-- For small screens -->
            <div class="d-block d-md-none col-12">

                <div class="card d-flex flex-row mb-3 table-heading">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body pl-0 pb-0">
                            <p class="list-item-heading mb-0 text-primary">Two factor
                                authentication</p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                DEVELOPER
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                TEAM
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                ENTERPRISE
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card d-flex flex-row mb-3 table-heading">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body pl-0 pb-0">
                            <p class="list-item-heading mb-0 text-primary">Team permissions</p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                DEVELOPER
                            </p>

                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                TEAM
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                ENTERPRISE
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card d-flex flex-row mb-3 table-heading">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body pl-0 pb-0">
                            <p class="list-item-heading mb-0 text-primary">24/5 Support</p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                DEVELOPER
                            </p>

                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                TEAM
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                ENTERPRISE
                            </p>

                        </div>
                    </div>
                </div>



                <div class="card d-flex flex-row mb-3 table-heading">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body pl-0 pb-0">
                            <p class="list-item-heading mb-0 text-primary">24/7 Support</p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                DEVELOPER
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                TEAM
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                ENTERPRISE
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>



                <div class="card d-flex flex-row mb-3 table-heading">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body pl-0 pb-0">
                            <p class="list-item-heading mb-0 text-primary">User actions audit log</p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                DEVELOPER
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                TEAM
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="card-body align-self-center d-flex flex-row">
                            <p class="list-item-heading mb-0 truncate w-70">
                                ENTERPRISE
                            </p>
                            <p class="text-primary text-right mb-0 w-30 text-one">
                                <i class="simple-icon-check"></i>
                            </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="section background background-no-bottom mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                <h1>Start Your Free Month</h1>
                <p>
                    We tried to create an admin theme that we would like to use ourselves so we listed
                    our priorities. We would like to have a theme that is not over complicated to use,
                    does the job well, contains must have components and looks really nice.
                </p>
            </div>

            <div class="col-12 offset-0 col-lg-6 offset-lg-3 newsletter-input-container">
                <div class="text-center mb-3">
                    <button class="btn btn-secondary btn-xl" type="button">FREE TRIAL</button>
                </div>
            </div>
        </div>
    </div>
</div>