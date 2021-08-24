<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Groups $model
*/

$this->title = Yii::t('models', 'Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud groups-update">

    <h1>
        <?= Yii::t('models', 'Groups') ?>
        <small>
                        <?= Html::encode($model->title) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
