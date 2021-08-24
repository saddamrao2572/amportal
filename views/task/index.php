<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\taskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'task');
$this->params['breadcrumbs'][] = $this->title;


/**
* create action column template depending acces rights
*/
$actionColumnTemplates = [];

if (\Yii::$app->user->can('app_task_view', ['route' => true])) {
    $actionColumnTemplates[] = '{view}';
}

if (\Yii::$app->user->can('app_task_update', ['route' => true])) {
    $actionColumnTemplates[] = '{update}';
}

if (\Yii::$app->user->can('app_task_delete', ['route' => true])) {
    $actionColumnTemplates[] = '{delete}';
}
if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New'), ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud task-index">

    <?php
           // echo $this->render('_search', ['model' =>$searchModel]);
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
				   <a href="<?=url::to(['task/create'])?>" class="btn btn-primary default btn-lg mb-1" style="font-size: 12px"> <i class="simple-icon-plus"></i> Add New task</a>

				</div>
			</div>

			<div class="card">
                <div class="card-body">
                    <div class="dashboard-quick-post">
						
						<div class="task-index">

  

							<?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
								   

								   
									
									
									'title',
									// 'unique_id',
									'start_date',
									'end_date',
									//'updated_at',
									//'updated_by',
									'status',
									//'about',
									//'address',
								   
									'order_type',
									//'GST',
									//'tax_number',

								  	[
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view}{delete} ',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="simple-icon-note"></i>', $url, [
									'title' => Yii::t('app', 'Edit This item'),
									'data-pjax'=>'0',
								]);
							},
							'delete' => function ($url, $model) {
								return Html::a('<i class="simple-icon-trash"></i>', $url, [
									'title' => Yii::t('app', 'Delete This item'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="simple-icon-eye"></i>', $url, [
									'title' => Yii::t('app', 'View This item'),
									'data-pjax'=>'0',
								]);
							},
							
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/task/update','id'=>$model->id]); // your own url generation logic
								return $url;
							}
							if ($action === 'delete') {
								$url = Url::to(['/task/delete','id'=>$model->id]); // your own url generation logic
								return $url;
							}
							
							if ($action === 'view') {
								$url = Url::to(['/task/view/','id'=>$model->id]); // your own url generation logic
								return $url;
							}
							
						}
					], 
								],
								
							]); ?>

							<?php Pjax::end(); ?>

						</div>



                    </div>
                </div>
            </div>
			
		</div>
	</div>
</div>











<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

// A $( document ).ready() block.
$( document ).ready(function() {
   $('link[href="/assets/15000306/css/bootstrap.css"]').remove();    
});
</script>
