<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Groups $model
*/

$this->title = Yii::t('models', 'Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud groups-create">

    <h1>
        <?= Yii::t('models', 'Groups') ?>
        <small>
                        <?= Html::encode($model->title) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            Yii::t('cruds', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
