<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Registered Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid disable-text-selection">
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
    <div class="separator mb-5"></div>

    <div class="row">
    
        <div class="col-12 col-lg-12">
        <div class="mb-2">
				<h1><?=$this->title?></h1>
				<div class="float-md-right text-zero">
				   <a href="<?=url::to(['site/create-user'])?>" class="btn btn-primary btn-lg mb-1" style="font-size: 12px"> <i class="simple-icon-plus"></i> Create User</a>

				</div>
			</div>

                
          
            <div class="separator mb-5"></div>

            
                <div class="row">                           
                <div class="col-12 list background-white card mb-4" data-check-all="checkAll">                     
            
                <?php Pjax::begin(); ?>    
                    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'id',
                                // 'profile_image',
                                [
                                    'attribute'=>'profile_image',
                                    'label'=>false,
                                    'format'=>'raw',
                                    'value' => function($data){
                                        $url = Url::to(['/uploads/users/'.$data->user_id.'/'.$data->profile_image]);
                                        if (!empty($data->profile_image)) {
                                            return Html::img($url,['alt'=>$data->name,  'width'=>'40px']); 
                                        }
                                        else{
                                            $url =Url::to(['/img/userprofile.png']);
                                            return Html::img($url,['alt'=>$data->name, 'width'=>'40px']); 
                                        }
                                        
                                    }
                                ],
                                // 'user_id',
                                'name',
                                //
                                [
                                    'attribute'=>'user_id',
                                    'label'=>'Email',
                                    'format' =>'raw',
                                    'value' => function($data){
                                    $url= \app\models\User::find()->Where(['id' => $data->user_id])->one();
                                        if (!empty($url)) 
                                        {
                                        return $url->email;
                                        }
                                        else
                                        {
                                         return " N/A ";
                                        }  
                                    }
                                ],
                                // 'about:ntext',
                                
                                //'country',
                                // 'state',
                                // 'city',
                                // 'street',
                                // 'zip',
                              //  'created_at',
                                // 'status',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header'=>"Actions",
                                    'template'=>'  {active}{deactive} {delete} {view} ',
                                    'buttons'=>[
                                        
                                        'deactive' => function ($url, $model) {
                                            $user=\app\models\User::find()->Where(['id' => $model->user_id])->one();
                                            if ($user->status==1) {
                                                return Html::a('<button class="btn btn-outline-danger default mb-1 btn-sm"> <i class="simple-icon-close"> </i> Deactivate </button>', $url, [
                                                    'title' => Yii::t('app', 'You Will Deactivate Him/Her. He/She can not SignIn after Deactivate'),
                                                    'data-pjax'=>'0',
                                                    'class'=>'',
                                                ]);
                                            }
                                        },
                                        'active' => function ($url, $model) {
                                            $user=\app\models\User::find()->Where(['id' => $model->user_id])->one();
                                                if ($user->status==0) {
                                                return Html::a('<button class="btn btn-outline-success default mb-1 btn-sm"> <i class="simple-icon-check"> </i> Activate </button>', $url, [
                                                    'title' => Yii::t('app', 'You Will Activate Him/Her. He/She can SignIn after Activate'),
                                                    'data-pjax'=>'0',
                                                    'class'=>'',
                                                ]);
                                            }
                                        },
                                        'view' => function ($url, $model) {
                                            return Html::a('<button class="btn btn-outline-info default mb-1 btn-sm"> <i class="simple-icon-eye"> </i> Profile </button>', $url, [
                                                'title' => Yii::t('app', 'Click To View Profile Details'),
                                                'data-pjax'=>'0',
                                                'class'=>'',
                                            ]);
                                        },
                                        'delete' => function ($url, $model) {
                                            return Html::a('<button class="btn btn-outline-danger default mb-1 btn-sm"> <i class="simple-icon-trash"> </i> Delete </button>', $url, [
                                                'title' => Yii::t('app', 'Click To Delete User'),
                                                'data-pjax'=>'0',
                                                'class'=>'',
                                            ]);
                                        }
                                    ],
                                    'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'active') {
                                            $url = Url::to(['/user-details/activate','id'=>Yii::$app->util->encrypt($model->user_id)]); // your own url generation logic
                                            return $url;
                                        }
                                        if ($action === 'deactive') {
                                            $url = Url::to(['/user-details/deactivate','id'=>Yii::$app->util->encrypt($model->user_id)]); // your own url generation logic
                                            return $url;
                                        }
                                        if ($action === 'view') {
                                            $url = Url::to(['/user-details/view','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
                                            return $url;
                                        }
                                        if ($action === 'delete') {
                                            $url = Url::to(['/user-details/delete','id'=>Yii::$app->util->encrypt($model->user_id)]); // your own url generation logic
                                            return $url;
                                        }
                                        // if ($action === 'post') {
                                            // $url = Url::to(['/agency/now/'.$model->page_id]); // your own url generation logic
                                            // return $url;
                                        // }
                                        
                                    }
                                ],
                            ],
                        ]); 
                    ?>
                <?php Pjax::end(); ?>

            
                
        
            
            </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    td > img
    {
        border-radius: 30px;
    }
</style>