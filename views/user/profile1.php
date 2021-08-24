<?php
    use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\widgets\Pjax;
	use yii\helpers\Url;
	use kartik\widgets\FileInput;
	use yii\widgets\DetailView;
	
	$this->title = "Profile"
?>
<div class="row">
	<div class="col-sm-4 col-lg-3">
		<div class="sidebar">
		    <div class="widget">
			<div class="user-photo">
			
			<?php $form = ActiveForm::begin([ 'options'=>['enctype'=>'multipart/form-data']]); ?> 
				<?php Pjax::begin(['id' => 'profile-image-pjax']); ?>
					<div id="profileDiv">
						<img src="<?= !empty($model->profile_image) ? Url::to(['/user/logo/','id'=>Yii::$app->util->encrypt($model->id)]) : "/img/tmp/agent-2.jpg"; ?>" alt="User Photo" style="height:228px;overflow:hidden">
						<a href="javascript://" class='change-picture text-center'>Change Picture</a>
					</div>
				<?php Pjax::end(); ?>
				<div class="profile-image-div hidden">
					<?=$form->field($model, 'profile_image')->widget(FileInput::classname(), [
						'options' => ['accept' => 'image/*','class'=>'hidden'],
						'pluginOptions' => [
								'initialPreview'=>[
									
								],
								'overwriteInitial'=>false,
								'maxFileSize'=>1024*5,
								'fileActionSettings' => [
									'uploadIcon' =>'',
								],
								
								'uploadUrl' => Url::to(['/user/image-upload','id'=>Yii::$app->util->encrypt($model->id)]),
							],
						
					]);?>
				</div>
				
				<?php ActiveForm::end(); ?>
			
			</div><!-- /.user-photo -->
			</div><!-- /.widget -->
			
			


			<div class="widget">
				<ul class="menu-advanced">
					<li><a href="<?= Url::to(['/gym/create']) ?>"><i class="fa fa-pencil"></i> Submit Listing</a></li>
					<li class="active"><a href="javascript://"><i class="fa fa-user"></i> Edit Profile</a></li>
					<li><a href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
			</div><!-- /.widget -->
		</div><!-- /.sidebar -->
    </div><!-- /.col-* -->
    <div class="col-sm-8 col-lg-9">
        <div class="content">
			
			<?= $this->render('_profile',['model'=>$model]) ?>
			
		</div><!-- /.content -->
	</div><!-- /.col-* -->
</div><!-- /.row -->

<?php
$file = Html::getInputId($model,'profile_image');
$js = <<< JS
 
 $(document).ready(function () { 
	$(".change-picture").on("click",function(){
		
		$("#$file").click();
	});
	$("#$file").on('change', function(event, previewId) {
		
		$("#$file").fileinput('upload');
	});
	$("#$file").on('fileuploaded', function(event, previewId) {
		
		$.pjax.reload({container:'#profile-image-pjax'});
		//$("#$file").fileinput('upload');
	});
	
 });

JS;

$this->registerJs($js);
?>
