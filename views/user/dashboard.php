<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\helpers\Url;
//use jino5577\daterangepicker\DateRangePicker;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use app\models\Gym;
use app\models\GymLikes;
use app\models\GymReviews;
?>

<div class='row'>
	<div class='col-md-12'>
		<div class="page-title">
			<h1>Dashboard</h1>
		</div><!-- /.page-title-* -->
	</div><!-- /.col-* -->
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-4">
		<div class="card-box">
			<div class="bar-widget">
				<div class="table-box">
					<div class="table-detail">
						<div class="iconbox bg-info bg-dashboard">
							<i class="flaticon-gym"></i>
						</div>
					</div>

					<div class="table-detail">
					   <h4 class="m-t-0 m-b-5"><b><?= $modelGym ?></b></h4>
					   <p class="text-muted m-b-0 m-t-0"> Gym Added This Month</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card-box">
			<div class="bar-widget">
				<div class="table-box">
					<div class="table-detail">
						<div class="iconbox bg-info bg-dashboard">
							<i class="fa fa-sticky-note-o"></i>
						</div>
					</div>

					<div class="table-detail">
					   <h4 class="m-t-0 m-b-5"><b><?= $modelPost ?></b></h4>
					   <p class="text-muted m-b-0 m-t-0">Total No.of Forum Posts</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card-box">
			<div class="bar-widget">
				<div class="table-box">
					<div class="table-detail">
						<div class="iconbox bg-danger bg-dashboard">
							<i class="fa fa-comments-o"></i>
						</div>
					</div>

					<div class="table-detail">
					   <h4 class="m-t-0 m-b-5"><b><?= $PostComments; ?></b></h4>
					   <p class="text-muted m-b-0 m-t-0">Total Forum Comments </p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
    <div class='col-md-12'>
		<div class="card-box">
		<h2>Gym Added</h2>
		<?php Pjax::begin(); ?>  
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
			
					[
					    'attribute' => 'name',
					    'label' => 'Gym Name',
						'filter' => DateRangePicker::widget([
							'model' => $searchModel,
							'attribute' => 'created_at_range',
							'name' => 'created_at_range',
							'presetDropdown' => true,
							'hideInput' => true,
							'convertFormat' => true,							
							'pluginOptions' => [
								'locale' =>[
									'format' => 'd-m-Y',
								]
							]
						]),
					],
					[
					    'attribute' => 'email',
						'filter' => false	
					],
					
					[
					    'attribute' => 'created_at',
						'label' => 'Created Date',
                        'filter' => false,
						'format' => ['date', 'php:d-m-Y']					
					],
					
					[
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view} {gallery}',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Edit'),
									'data-pjax'=>'0',
								]);
							},
							'gallery' => function ($url, $model) {
								return Html::a('<i class="fa fa-picture-o"></i>', $url, [
									'title' => Yii::t('app', 'Gallery'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							}
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/gym/update','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'remove') {
								$url = Url::to(['/gym/delete','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'gallery') {
								$url = Url::to(['/gym/gallery','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'view') {
								$url = Url::to(['/gym/'. $model->slug]); // your own url generation logic
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

<div class="row">
    <div class='col-md-12'>
		<div class="card-box">
		<h2>Gym Most Viewed</h2>
		<?php Pjax::begin(); ?>  
			<?php
			
			 echo GridView::widget([
				'dataProvider' => $dataProvider1,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
			
					[
					    'attribute' => 'name',
					    'label' => 'Gym Name',
						'filter' => false
					],
					[
					    'attribute' => 'views',
						'filter' => false	
					],
					
					[
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view} {gallery}',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Edit'),
									'data-pjax'=>'0',
								]);
							},
							'gallery' => function ($url, $model) {
								return Html::a('<i class="fa fa-picture-o"></i>', $url, [
									'title' => Yii::t('app', 'Gallery'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							}
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/gym/update','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'remove') {
								$url = Url::to(['/gym/delete','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'gallery') {
								$url = Url::to(['/gym/gallery','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'view') {
								$url = Url::to(['/gym/'. $model->slug]); // your own url generation logic
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


<div class="row">
    <div class='col-md-12'>
		<div class="card-box">
		<h2>Gym Most Liked</h2>
		<?php Pjax::begin(); ?>  
			<?php 			
				
			echo GridView::widget([
				'dataProvider' => $dataProvider3,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
			
					[
						'label' => 'Gym Name',
						'value' => function( $data ) {
							return $data->gym->name;  		
						},
						'filter' => false
					],
					[
					    'attribute' =>'likes',
						'label' => 'Likes',
						'filter' => false
					],
					[
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view} {gallery}',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Edit'),
									'data-pjax'=>'0',
								]);
							},
							'gallery' => function ($url, $model) {
								return Html::a('<i class="fa fa-picture-o"></i>', $url, [
									'title' => Yii::t('app', 'Gallery'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							}
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/gym/update','id'=>Yii::$app->util->encrypt($model->gym->id)]); 
								return $url;
							}
							if ($action === 'remove') {
								$url = Url::to(['/gym/delete','id'=>Yii::$app->util->encrypt($model->gym->id)]); 
								return $url;
							}
							if ($action === 'gallery') {
								$url = Url::to(['/gym/gallery','id'=>Yii::$app->util->encrypt($model->gym->id)]); 
								return $url;
							}
							if ($action === 'view') {
								$url = Url::to(['/gym/'. $model->gym->slug]); 
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

<div class="row">
    <div class='col-md-12'>
		<div class="card-box">
		<h2>Gym Most Reviewed</h2>
		<?php Pjax::begin(); ?>  
			<?php 			
				
			echo GridView::widget([
				'dataProvider' => $dataProvider2,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
			
					[
					    'label' => 'Gym Name',
						'value' => function( $data ) {
							return $data->gym->name;  		
						},
						'filter' => false
					],
					[
						'attribute' => 'reviews',
						'label' => 'OverAll Score',
						'value' => function( $data ) {
							return $data->reviews;  		
						},
						'filter' => false
					],
					
					[
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view} {gallery}',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Edit'),
									'data-pjax'=>'0',
								]);
							},
							'gallery' => function ($url, $model) {
								return Html::a('<i class="fa fa-picture-o"></i>', $url, [
									'title' => Yii::t('app', 'Gallery'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							}
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/gym/update','id'=>Yii::$app->util->encrypt($model->gym->id)]); 
								return $url;
							}
							if ($action === 'remove') {
								$url = Url::to(['/gym/delete','id'=>Yii::$app->util->encrypt($model->gym->id)]); 
								return $url;
							}
							if ($action === 'gallery') {
								$url = Url::to(['/gym/gallery','id'=>Yii::$app->util->encrypt($model->gym->id)]); 
								return $url;
							}
							if ($action === 'view') {
								$url = Url::to(['/gym/'. $model->gym->slug]); 
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

