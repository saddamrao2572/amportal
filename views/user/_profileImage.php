<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>
<?php Pjax::begin(['id' => 'profile-image-pjax']); ?>
<div class="card-simple" data-background-image="<?= !empty($model->userDetails->profile_image) ? Url::to(['/user/profile-image/','id'=>Yii::$app->util->encrypt($model->id),'q'=>time()]) : "/img/tmp/agent-2.jpg"; ?>">
	<div class="card-simple-background">
		<div class="card-simple-content">
			<div class="card-simple-actions">
				<a href="javascript://" class="change-picture"><i class='fa fa-camera'></i></a>
				
			</div><!-- /.card-simple-actions -->
		</div><!-- /.card-simple-content -->
	</div><!-- /.card-simple-background -->
</div><!-- /.card-simple -->
<?php Pjax::end(); ?>
<?php $form = ActiveForm::begin([ 'options'=>['enctype'=>'multipart/form-data']]); ?> 
	<div class="profile-image-div hidden">
		<?= $form->field($model, 'profileImage')->widget(FileInput::classname(), [
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
<?php
$file = Html::getInputId($model,'profileImage');
$js = <<< JS
 
 $(document).ready(function () { 
	$(".change-picture").on("click",function(){
		$("#$file").click();
	});
	$("#$file").on('change', function(event, previewId) {
		
		$("#$file").fileinput('upload');
	});
	$('#profile-image-pjax').on('pjax:end', function() { 
		$('*[data-background-image]').each(function() {
			$(this).css({
				'background-image': 'url(' + $(this).data('background-image') + ')'
			});
		});
	});
	$("#$file").on('fileuploaded', function(event, previewId) {
		
		$.pjax.reload({container:'#profile-image-pjax'});
		
		//$("#$file").fileinput('upload');
	});
	
 });

JS;

$this->registerJs($js);
?>
