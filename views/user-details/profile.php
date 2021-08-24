<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
use kartik\widgets\FileInput;
// use yii\helpers\Url;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Units */

$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = " | " .$this->title. " | ";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->name)];
$id=Yii::$app->util->encrypt($model->id);

$user=\app\models\User::find()->where(['id'=>$model->user_id])->one();
if (!empty($user)) {?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 list">

            <div class="mb-2" style="font-size: 20px;">
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                     <ol class="breadcrumb">
                        <?php
                        echo Breadcrumbs::widget([
                          'itemTemplate' => "<li class='breadcrumb-item'> <i> {link}   </i> </li>", 
                          'homeLink' => [ 
                            'label' => Yii::t('yii', 'Dashboard '),
                            // 'url' => Yii::$app->homeUrl,
                          ],
                           'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                       ]);
                        ?>
                     </ol>
                   
                </ol>
            </nav> 
            </div>
            <div class="separator mb-5"></div>
            <div class="tab-content">
                <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <div class="row">
                        <div class="col-lg-4 col-12 mb-4">
                            <div class="card mb-4">
                                <?php if (!empty($model->profile_image)) { ?>
                                <img src="/uploads/users/<?=$model->id ?>/<?= $model->profile_image ?>" alt="<?= $model->name?>" class="card-img-top" />
                                <?php }else{ ?>
                                <img src="/img/userprofile.png" alt="<?= $model->name?>" class="card-img-top" />
                                <?php } ?>

                                <div class="card-body">
                                    <h2><?=$model->name ?></h2>
                                    <h3>Contact Information</h3>
                                    <p class="text-muted text-small mb-2">Mobile: <?=$model->mobile ?></p>
                                    <p class="text-muted text-small mb-2">Email: <?=$user->email ?></p>
                                    <p class="text-muted text-small mb-2">Address: <br>
                                    <?=$model->street ?> , <?=$model->city ?> , <?=$model->state ?><br><?=$model->country ?><br><?=$model->zip ?><br></p><br></p>

                                    <p class="text-muted text-small mb-2">About</p>
                                    <p class="mb-3"><?=$model->about ?></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8">
                            <div class="card mb-4">
        <div class="card-body">
            <p class="list-item-heading mb-4">Edit Profile</p>
            <div class="">
                <div class="units-form">

                    <?php $form = ActiveForm::begin([ 'action'=>'update?id='.$id , 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]);?>

                    <?= $form->field($model, 'name',['template' => '<label class="form-group has-top-label"><span>Full Name</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For Example Math , English..', ]) ?>

                    <?= $form->field($model, 'mobile',['template' => '<label class="form-group has-top-label"><span>Mobile</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For 03041130792', ]) ?>

                    <?= $form->field($model, 'street',['template' => '<label class="form-group has-top-label"><span>Street#</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For Example, 12#house', ]) ?>

                    <?= $form->field($model, 'city',['template' => '<label class="form-group has-top-label"><span>Enter City Name</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For Example, vehari', ]) ?>

                    <?= $form->field($model, 'state',['template' => '<label class="form-group has-top-label"><span>Enter State Name</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For Example, punjab', ]) ?>

                    <?= $form->field($model, 'country',['template' => '<label class="form-group has-top-label"><span>Enter Country Name</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For Example, Pakistan', ]) ?>

                    <?= $form->field($model, 'zip',['template' => '<label class="form-group has-top-label"><span>Enter Zip/Post Code</span>{input}  </label>'])->textInput(['maxlength' => true,'placeholder' =>'For Example, 61100', ]) ?>

                    <?= $form->field($model, 'about',['template' => '<label class="form-group has-top-label"><span> Brief Description</span>{input}  </label>'])->textarea(['rows' => 3]) ?>


                    <?php if (!empty($model->profile_image)) { ?>
                        <?=$form->field($model, 'profile_image',['template' => '<label class="form-group has-top-label"><span>Select Profile Image</span>{input}  </label>'], ['labelOptions'=>['style'=>'color:#4267b2']])->widget(FileInput::classname(),
                        [ 
                            'options' => ['accept' => 'profile_image/*'], 
                            'pluginOptions' => [
                                    'showCaption' => false,
                                    'showRemove' => false,
                                    'showUpload' => false,
                                    'browseClass' => 'btn btn-primary btn-block',
                                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                    'browseLabel' =>  'Select Profile Image',
                                    'initialPreview'=> [
                                    '<img src="/uploads/users/'.$model->id."/".$model->profile_image.'" class="file-preview-image">',
                                    ],
                                    'initialCaption'=> $model->profile_image,
                                ],
                        ]) ?>

                    <?php  }else{ ?>
                        <?=$form->field($model, 'profile_image',['template' => '<label class="form-group has-top-label"><span>Select Course Image</span>{input}  </label>'], ['labelOptions'=>['style'=>'color:#4267b2']])->widget(FileInput::classname(),
                        [ 
                            'options' => ['accept' => 'profile_image/*'], 
                            'pluginOptions' => [
                                    'showCaption' => false,
                                    'showRemove' => false,
                                    'showUpload' => false,
                                    'browseClass' => 'btn btn-primary btn-block',
                                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                    'browseLabel' =>  'Select Profile Image',
                                    ],
                        ]) ?>

                    <?php } ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-lg btn-primary float-right' : 'btn btn-lg btn-primary float-right']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php } ?>



<style type="text/css">
    .has-top-label label, .has-top-label > span:last-of-type
    {
        font-size: 13px !important;
    }
    .form-control, .form-group.has-top-label .bootstrap-tagsinput {
        height: calc(4.3rem + 4px) !important;
        font-size: 13px !important;
    }
    .btn{
        font-size: 12px !important;
    }
    .fileinput-cancel-button ,.fileinput-upload-button
    {
        display: none !important;
    }
    .file-preview-image
    {
        width: inherit;
    }

    #userdetails-about {
        height: 100px !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

// A $( document ).ready() block.
$( document ).ready(function() {
    
  
   $('link[href="/assets/c246c606/css/bootstrap.css"]').remove();
 
  // alert('removed');
    
});
</script>