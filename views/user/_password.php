<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
?>
<div class="page-title">
	<h1>Change Password</h1>
</div><!-- /.page-title -->
<?php Pjax::begin(['id'=>'password']) ?>
	<?php
			$form = ActiveForm::begin([
				'id' => 'password_form',
				'enableClientValidation' => true,
				'options' =>['data-pjax'=>'']
			]);
	?>
		<div class="background-white p20 mb30">
			<?php
				foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
					echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
				}
			?>
			<?= $form->field($model, 'old_password')->passwordInput(['autofocus' => true]) ?>
			<?= $form->field($model, 'new_password')->passwordInput([]) ?>
			<?= $form->field($model, 'password_repeat')->passwordInput([]) ?>
			
			<button type="submit" class="btn btn-primary pull-right">Change Password</button>
			<div class='clearfix'></div>
		</div>
	<?php ActiveForm::end(); ?> 
<?php Pjax::end(); ?>
