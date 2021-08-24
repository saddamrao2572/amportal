<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
/* @var $this yii\web\View */

// $this->title = 'My Yii Application';]
$this->title = 'Home ';
$this->params['breadcrumbs'][] ='  | '. $this->title;
?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							
							<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
								<ol class="breadcrumb pt-0">
									 <ol class="breadcrumb">
										<?php
										echo Breadcrumbs::widget([
										  'itemTemplate' => "<li class='breadcrumb-item'> <i> {link}   </i> </li>", 
										  'homeLink' => [ 
											'label' => Yii::t('yii', 'Dashboard'),
											'url' => Yii::$app->homeUrl,
										  ],
										   'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
									   ]);
										?>
									 </ol>
								   
								</ol>
							</nav> 
						</div>
					</div>
					<div class="separator mb-5"></div>	
					<div class="row">
						<div class="col-12 col-lg-8">
							<div class="row icon-cards-row">
								<div class="col-md-4 col-lg-4 col-sm-4 col-4 mb-4">
									<a href="#" class="card">
										<div class="card-body text-center">
											<i class="iconsmind-Books-2"></i>
											<p class="card-text mb-0">Categories</p>
											<p class="lead text-center">2</p>
										</div>
									</a>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 col-4 mb-4">
									<a href="#" class="card">
										<div class="card-body text-center">
											<i class="iconsmind-Calendar-Clock"></i>
											<p class="card-text mb-0">Scheduled Study</p>
											<p class="lead text-center">16</p>
										</div>
									</a>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 col-4 mb-4">
									<a href="#" class="card">
										<div class="card-body text-center">
											<i class="simple-icon-question"></i>
											<p class="card-text mb-0">Cards</p>
											<p class="lead text-center">16</p>
										</div>
									</a>
								</div>
							<div class="col-md-4 col-lg-4 col-sm-4 col-4 mb-4">
									<a href="#" class="card">
										<div class="card-body text-center">
											<i class="iconsmind-Notepad"></i>
											<p class="card-text mb-0">Test</p>
											<p class="lead text-center">16</p>
										</div>
									</a>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 col-4 mb-4">
									<a href="#" class="card">
										<div class="card-body text-center">
											<i class="iconsmind-Open-Book"></i>
											<p class="card-text mb-0">Courses</p>
											<p class="lead text-center">16</p>
										</div>
									</a>
								</div>
								<div class="col-md-4 col-lg-4 col-sm-4 col-4 mb-4">
									<a href="#" class="card">
										<div class="card-body text-center">
											<i class="iconsmind-Network"></i>
											<p class="card-text mb-0">Community</p>
											<p class="lead text-center">16</p>
										</div>
									</a>
								</div>
							
							
							
							</div>
						</div>
						<div class="col-md-12 col-lg-4 mb-4">
						<?= $this->render('_friends') ?>
							
						</div>
					</div>
                </div>
				
               						
                