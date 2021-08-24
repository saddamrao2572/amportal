<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\Company $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="company-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Company',
   
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
                <div class="col-md-6">
                    
                  <!-- attribute ticketing_recipients -->
                  <?= $form->field($model, 'name')->textInput(['placeholder' => "Please Enter Company Name"],['maxlength' => true]) ?>
                    
                </div>
           
                <div class="col-md-6">
                    
                <!-- attribute contract_expiration_alert_recipients -->
               
                <?= $form->field($model, 'company_head_name')->textInput(['placeholder' => "Please Enter Company Head Name"],['maxlength' => true]) ?>
                </div>
            </div>

			<div class="row">
                <div class="col-md-6">
                    
                  <!-- attribute ticketing_recipients -->
                  <?= $form->field($model, 'type')->textInput(['placeholder' => "Please Enter Company Type"],['maxlength' => true]) ?>
                    
                </div>
           
                <div class="col-md-6">
                    
                <!-- attribute contract_expiration_alert_recipients -->
               <!-- attribute status -->
			 <?= $form->field($model, 'zip')->textInput(['placeholder' => "Please Enter Zip Code"],['maxlength' => true]) ?>
                    
                </div>
            </div>
			
			<div class="row">
                <div class="col-md-6">
                    
                  <!-- attribute ticketing_recipients -->
                  <?= $form->field($model, 'address')->textarea(['rows' => 2]) ?>  
                </div>
           
                <div class="col-md-6">
                    
                <!-- attribute contract_expiration_alert_recipients -->
               <!-- attribute status -->
			 <?= $form->field($model, 'about')->textarea(['rows' => 2]) ?>
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
        'label'   => Yii::t('models', 'Company'),
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