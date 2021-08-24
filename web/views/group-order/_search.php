<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\GroupOrderSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="group-order-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'task_id') ?>

		<?= $form->field($model, 'group_id') ?>

		<?= $form->field($model, 'created_by') ?>

		<?= $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'unique_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
