<?php

use yii\helpers\Url;
use yii\widgets\ListView;

$user=\app\models\User::find()->where(['id'=>$model->user_id])->one();
if (!empty($user)) {?>
<div class="boxshadow" style="box-shadow:1px 1px 1px 1px #ccc5c5">   
	<div class="card d-flex flex-row mb-3">
        <a class="d-flex" data-toggle="collapse" href="#<?=$model->id?>" role="button" aria-expanded="true" aria-controls="<?=$model->id?>">

        	<?php if (!empty($model->profile_image)) { ?>
            <img src="/uploads/users/<?=$model->id ?>/<?= $model->profile_image ?>" alt="<?= $model->name?>" class="list-thumbnail responsive border-0" />
            <?php }else{ ?>
            <img src="/img/userprofile.png" alt="<?= $model->name?>" class="list-thumbnail responsive border-0" />
            <?php } ?>
        </a>
        <div class="pl-2 d-flex flex-grow-1 min-width-zero">
            <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                <a data-toggle="collapse" href="#<?=$model->id?>" role="button" aria-expanded="true" aria-controls="<?=$model->id?>" class="w-40 w-sm-100">
                    <p class="list-item-heading mb-1 truncate"><?= $model->name ?></p>
                </a>
                <p class="mb-1 text-muted text-small w-20 w-sm-100" ><?php if (!empty($user->email)) { echo $user->email;} else{ echo "No Email"; }?></p>
                <p class="mb-1 text-muted text-small w-15 w-sm-100"><?= $model->mobile ?></p>
                <div class="w-15 w-sm-100">
                    <span class="badge badge-pill badge-primary"><?php if ($model->status==1) { echo "online"; } else{ echo "offline"; }?></span>
                </div>
            </div>

            <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                <label class="custom-control custom-checkbox mb-0">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-label"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="collapse" id="<?=$model->id?>" style="background: white;">
        <div class="p-4 border">
            <h3>Address </h3>
            <p class="mb-0"><?=$model->street ?> , <?=$model->city ?> , <?=$model->state ?><br><?=$model->country ?><br><?=$model->zip ?><br></p><br>
            <h3>About </h3>
            <p class="mb-0"><?=$model->about ?></p>
        </div>
    </div>
</div>
<?php } ?>