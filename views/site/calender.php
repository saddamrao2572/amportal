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
<!-- COunters -->
<?php 

// $totalcategories=count(\app\models\Category::find()->all());

?>
	<div class="separator mb-5"></div>	
	<div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            
                               
                                <p class="lead">Task Calendar
                                    </p>
                                <hr class="my-4">
                                 <div class="col-lg-12 mb-4">
									<div class="card h-100">
										<div class="card-body">
											<h5 class="card-title">Calendar</h5>
											<div class="calendar"></div>
										</div>
									</div>
								</div>
                                
                            

                        </div>
                    </div>
                </div>
            </div>
</div>

<style type="text/css">
	a.card {
	    box-shadow: 2px 2px 1px 1px #c1c1c1;
	}
	.navbar .navbar-logo .logo {
    width: 110px;
    height: 60px;
    background: url(../img/techuire.png) no-repeat;
    background-position: 50%;
    margin: 0 auto;
}
</style>