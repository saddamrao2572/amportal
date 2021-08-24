<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Url;
use app\models\User;
use kartik\widgets\FileInput;
use yii\widgets\Breadcrumbs;

$this->title = 'Add New User';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-12">
			
			<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
				<ol class="breadcrumb pt-0">
					 <ol class="breadcrumb">
						<?php
						echo Breadcrumbs::widget([
						  'itemTemplate' => "<li class='breadcrumb-item'> <i> {link}   </i> </li>", 
						  'homeLink' => [ 
							'label' => Yii::t('yii', 'Dashboard'),
							'url' => Yii::$app->homeUrl,
						  ],
						   'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					   ]);
						?>
					 </ol>
				   
				</ol>
			</nav> 
		</div>
	</div>
<!-- COunters -->
<?php 

// $totalcategories=count(\app\models\Category::find()->all());

?>
	<div class="separator mb-5"></div>	

	<div class="row">
		<div class="col-12 col-lg-12">
			<div class="mb-2">
				<h1><?=$this->title?></h1>
				<div class="float-md-right text-zero">
				   <a href="<?=url::to(['site/manage-users'])?>" class="btn btn-primary btn-lg mb-1" style="font-size: 12px"> <i class="simple-icon-user-follow"></i> Manage Users</a>

				</div>
			</div>

			<div class="card">
                <div class="card-body">
                    <div class="dashboard-quick-post">
                    
                         <?php
                             $form = ActiveForm::begin([
                            'id' => 'parents-login-form',
                            'class'=>'cmxform',
                            'enableClientValidation' => true,
                          ]);
                      
                      ?>
                      
                      <div class="row">
                          <div class="col-md-6">
                            
                              <label class="form-group has-float-label mb-4">
                                    <select id="inputState" name="user_type" class="form-control" required>
                                        <option selected value="">Please Select User Role..</option>
                                        <option value="admin">Super Admin</option>
                                        <option value="subadmin">Sub Admin</option>
                                        <option value="company">Company</option>
                                        <option value="user">User</option>
                                       
                                    </select>
                            <span>User Role</span>
                            </label>
                                    
                          </div>
                          <div class="col-md-6">
                             <label class="form-group has-float-label mb-4">
                                <?= $form->field($userDetailsModel, 'name')->textInput(['maxlength' => true , 'placeholder'=>'Enter Your Full Name'])->label(false) ?>
                                <span>Full Name</span>
                            </label>
                          </div>
                          
                          <div class="col-md-6">
                               <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true , 'placeholder'=>'Enter Your Username'])->label(false) ?>
                                    <span>Username</span>
                                </label>
                          </div> 
                          
                           <div class="col-md-6">
                            <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true , 'placeholder'=>'Enter Your Valid Email'])->label(false) ?>
                                    <span>Email</span>
                                </label>
                          </div>
                          <div class="col-md-6">
                             <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'password_hash')->passwordInput(['placeholder'=>'Enter Password'])->label(false) ?>
                                    <span>Password</span>
                                </label>
                          </div> 
                          <div class="col-md-6">
                            <label class="form-group has-float-label mb-4">
                                    <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder'=>'Confirm Password'])->label(false) ?>
                                    <span>Confirm Password</span>
                                </label>
                          </div>
                      </div>
                       <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? '<i class="simple-icon-drawer "> </i> Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-lg btn-primary float-right' : 'btn btn-lg btn-primary float-right']) ?>
                        </div>
                      <?php ActiveForm::end(); ?>
                    
                      	
                    </div>
                </div>
            </div>
			
		</div>
	</div>
</div>
