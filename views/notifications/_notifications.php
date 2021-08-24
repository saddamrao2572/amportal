<?php

use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="boxshadow" style="box-shadow:1px 1px 1px 1px #ccc5c5">							
<div class="card d-flex flex-row">
		<a class="d-flex" href="<?=$model->link ?>" target="_blank">
			<div class="rounded-circle m-4 align-self-center list-thumbnail-letters">
				<?php 
				if ($model->status==0) {
					echo "New";
				}elseif ($model->status==1) {
					echo "Read";
				}
				?>
			</div>
		</a>
		<div class=" d-flex flex-grow-1 min-width-zero">
			<div class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
				<div class="min-width-zero">
					<a href="<?=$model->link ?>" target="_blank">
						<p class="list-item-heading mb-1 truncate"><?=$model->title?></p>
					</a>
					<p class="mb-2 text-muted text-small"><?=$model->created_at?></p>
					<a href="<?= Url::to(['/notifications/delete/'.Yii::$app->util->encrypt($model->id)]);?>" class="btn btn-xs btn-outline-danger ">Delete</a>
					
				</div>
			</div>
		</div>
		
	</div>							
</div>									
											
<style type="text/css">
	.list-thumbnail
	{
		max-width: 85px !important;
	}
</style>