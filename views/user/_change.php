<div class="page-title">
	<h1>Profile</h1>
</div><!-- /.page-title -->
<!-----Contact Information Form----->

<?php
$form = ActiveForm::begin([
	'id' => 'contact_information_form',
	'enableClientValidation' => true,
]);
?>
<div class="background-white p20 mb30">
	<h3 class="page-title">
		Change Password
		<!--<button class="btn btn-primary btn-xs pull-right">Save</button>-->
		<?= Html::submitButton('Change Password', ['class' => 'btn btn-primary btn-xs pull-right', 'name' => 'change_button']) ?>
	</h3>
	
		<?= $form->field($model, 'old_password')->passwordInput() ?>
		<?= $form->field($model, 'new_password')->passwordInput() ?>
		<?= $form->field($model, 'password_repeat')->passwordInput() ?>
	
</div>
<?php ActiveForm::end(); ?>