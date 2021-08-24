<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = Yii::t('app', 'Create Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
		<div class="col-12 col-lg-12">
			<div class="mb-2">
				<h1> <i class="iconsmind-Building"></i> <?=$this->title?></h1>
				<div class="float-md-right text-zero">
				   <?=             Html::a('<i class="simple-icon-action-undo"> </i> '.
                    Yii::t('cruds', 'Back'),
                    \yii\helpers\Url::previous(),
                    ['class' => 'btn btn-light default btn-lg mr-1']) ?>  
                     <a href="<?=url::to(['/company/index'])?>" class="btn btn-primary default btn-lg " style="font-size: 12px"> <i class="simple-icon-note"></i> Manage Company</a>

				</div>
			</div>

			<div class="card">
                <div class="card-body">
                    <div class="dashboard-quick-post">
                      	<?= $this->render('_form', [
								'model' => $model,
								
							]) ?>
                    </div>
                </div>
            </div>
			
		</div>
	</div>
</div>
