<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use yii\bootstrap4\Modal;

use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/**
* @var yii\web\View $this
* @var app\models\Groups $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="Groups-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Groups',
   
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
  <?php echo $form->errorSummary($model); ?>
        <p>
          
            <div class="row">
                <div class="col-md-12">
                    
                  <!-- attribute ticketing_recipients -->
                  <?= $form->field($model, 'title')->textInput(['placeholder' => "Please Enter Group Name"],['maxlength' => true]) ?>
                  
					<?= $form->field($model, 'company_id')
							->dropDownList(
								ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
								['prompt'=>'Select Company...','class'=>'form-control dropdown' ]    // options
							);
					 ?>
                </div>
           
               
            </div>

			


         </p>
        <?php $this->endBlock(); ?>
        
        <?=
        Tabs::widget(
                     [
                        'encodeLabels' => false,
                        'items' => [ 
                            [
        'label'   => Yii::t('models', 'Groups'),
        'content' => $this->blocks['main'],
        'active'  => true,
    ],
                        ]
                     ]
        );
        ?>
       
<div class="float-md-right text-zero">
        <?= Html::a('<i class="simple-icon-close"> </i> '.
            Yii::t('cruds', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-light default btn-lg mr-1 ']) ?>  

        <?= Html::submitButton(
        '<span class="iconsmind-Disk"></span> ' .
        ($model->isNewRecord ? Yii::t('cruds', 'Save') : Yii::t('cruds', 'Save')),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-lg btn-primary default float-right'
        ]
        );
        ?>
        </div>
        
   

        <?php ActiveForm::end(); ?>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

// A $( document ).ready() block.
$( document ).ready(function() {
   $('link[href="/assets/ec2155a5/css/bootstrap.css"]').remove();    
});
</script>