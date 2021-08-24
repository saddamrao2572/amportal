<?php
    use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\DetailView;
	
	$this->title = "Profile"
?>
<?php 
	$view = \Yii::$app->urlManager->parseRequest(Yii::$app->request);
	//print_r( $view);
	$view = trim($view[0]); 
?>
<div class="container">
	<div class="card">
	<div class="card-body">
	<div class="row">
		
		<div class="col-sm-12 col-lg-12">
			<div class="content">
				<?php if($view == 'user/profile') : ?>
					<?= $this->render('_profile',['model'=>$model]) ?>
				<?php endif; ?>
				<?php if($view == 'user/password') : ?>
					<?= $this->render('_password',['model'=>$model]) ?>
				<?php endif; ?>
			</div><!-- /.content -->
		</div><!-- /.col-* -->
	</div><!-- /.row -->
	</div><!-- /.row -->
	</div><!-- /.row -->
</div><!-- /.profile -->
