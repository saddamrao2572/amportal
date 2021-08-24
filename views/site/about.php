<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
/* @var $this yii\web\View */

// $this->title = 'My Yii Application';]

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript" src="../../js/vendor/landing-page/jquery.autoellipsis.js"></script>
<div class="section home subpage">
    <div class="container">
        <div class="row home-row">
            <div class="col-12 col-xl-5 col-lg-12 col-md-12">
                <div class="home-text">
                    <div class="display-1">
                        About Our Company
                    </div>
                    <p class="white mb-5">
                        Leverage agile frameworks to provide a robust synopsis for high level
                        overviews. Iterative approaches to corporate strategy foster collaborative
                        thinking to further the overall value proposition.
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
            <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                <h1>A Brief History</h1>
                <p>
                    Data citizen-centered granular, effective altruism white paper engaging; best
                    practices thought partnership optimism. Shared value benefit corporation equal
                    opportunity the resistance human-centered philanthropy revolutionary commitment
                    co-create. Society, improve the world, resilient state of play equal opportunity
                    indicators.
                </p>

            </div>
        </div>
        <div class="row mt-5">
            <ul class="timeline">
                <li>
                    <div class="timeline-badge">
                        2011
                    </div>
                    <div class="card timeline-panel">
                        <div class="card-body">
                            <h3>Foundation</h3>
                            <p class="text-muted text-small mb-5">Citizen-centered incubator</p>
                            <p>
                                Equal opportunity changemaker scalable society; movements
                                commitment, fairness best practices. Youth white paper overcome
                                injustice her body her rights blended value because strategize. A
                                innovate; empower communities, activate save the world. Justice;
                                policymaker systems thinking to change-makers.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge">
                        2013
                    </div>
                    <div class="card timeline-panel">
                        <div class="card-body">
                            <h3>Expanding</h3>
                            <p class="text-muted text-small mb-5">Citizen-centered incubator</p>
                            <p>
                                Equal opportunity changemaker scalable society; movements
                                commitment, fairness best practices.<br><br>Youth white paper
                                overcome
                                injustice her body her rights blended value because strategize.
                                Youth social impact thought leader program area collective impact.
                                Data citizen-centered granular, effective altruism white paper
                                engaging; best practices thought partnership optimism.
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge">
                        2015
                    </div>
                    <div class="card timeline-panel">
                        <div class="card-body">
                            <h3>1000th Customer</h3>
                            <p class="text-muted text-small mb-5">Equal opportunity</p>
                            <p>
                                Game-changer inclusion; thought leader change-makers milestones;
                                benefit corporation storytelling. Compassion compelling emerging;
                                invest humanitarian. Academic gender rights incubator systems
                                thinking technology.<br><br>Engaging strengthening infrastructure
                                social
                                capital justice but external partners.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge">
                        2017
                    </div>
                    <div class="card timeline-panel">
                        <div class="card-body">
                            <h3>First Office in USA</h3>
                            <p class="text-muted text-small mb-5">Move the needle impact</p>
                            <p class="mb-0">
                                Leverage social innovation state of play commitment natural
                                resources targeted B-corp big data blended value. Society
                                empathetic gender rights grit, fairness families thought leadership
                                think tank thought partnership.<br><br>Communities thought
                                partnership
                                social capital corporate social responsibility collaborate.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="mb-0">
                    <div class="timeline-badge success">
                        2018
                    </div>
                    <div class="card timeline-panel">
                        <div class="card-body">
                            <h3>We're voted UK's Best Place to Work</h3>
                            <p class="text-muted text-small mb-5">Communities thought partnership</p>
                            <p class="mb-0">
                                Ideate compassion accessibility, invest paradigm. Social
                                entrepreneurship ideate effective altruism and social enterprise
                                living a fully ethical life.<br><br>Move the needle impact investing
                                impact investing black lives matter inclusion shared vocabulary
                                scalable social enterprise.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="clearfix no-float" style="margin-bottom:0;"></li>
            </ul>
        </div>
    </div>
</div>


<div class="section background">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center mb-4">
                <h1>Core Values</h1>

                <p class="section-text">
                    Mobilize shared vocabulary mobilize problem-solvers synergy, citizen-centered
                    collective impact low-hanging fruit. Change-makers, empower communities thought
                    leadership ideate grit incubator data.
                </p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-1.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">
                            Movements when shine philanthropy
                            co-creation our work.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-2.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">Program area and
                            dynamic venture.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-3.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">Citizen-centered
                            collective impact low-hanging fruit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-4.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">Mobilize shared
                            vocabulary mobilize problem-solvers synergy.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-5.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">To grit
                            indicators, incubator issue outcomes radical. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-6.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">Change-makers,
                            empower communities.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-7.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">Social return on
                            investment.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-dark text-white mb-5">
                    <img class="card-img" src="/img/landing-page/values-8.jpg" alt="Card image">
                    <div class="card-img-overlay d-flex justify-content-center">
                        <p class="card-text white text-center mb-0 align-self-center">Strategy invest
                            save the world.</p>
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
                <h1>Dore by Numbers</h1>
                <p>
                    Social return on investment unprecedented challenge co-creation bandwidth
                    entrepreneur compassion. Social entrepreneurship external partners;
                    citizen-centered do-gooder human-centered sustainable radical.
                </p>
            </div>
        </div>

        <div class="mt-5">
            <div class="col-12 p-0">
                <div class="owl-container">
                    <div class="owl-carousel home-carousel">

                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Conference large-icon"></i>
                                    <h5 class="mb-3">
                                        15.000 Happy Customers
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Money-Bag large-icon"></i>
                                    <h5 class="mb-3">
                                        Over 1M Open Source Donation
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-MaleFemale large-icon"></i>
                                    <h5 class="mb-3">
                                        240 Hard Working Employees
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Dog large-icon"></i>
                                    <h5 class="mb-3">
                                        4 Purrfect Co-workers
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    <i class="iconsmind-Post-Office large-icon"></i>
                                    <h5 class="mb-3">
                                        3 Offices in 2 Countries
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("body").removeClass("show-spinner");
  });
</script> -->