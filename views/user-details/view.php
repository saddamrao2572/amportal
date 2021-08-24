<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserDetails */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['site/manage-users'], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute'=>'profile_image',
                'label'=>false,
                'format'=>'raw',
                'value' => function($data){
                    $url = Url::to(['/uploads/users/'.$data->user_id.'/'.$data->profile_image]);
                    if (!empty($data->profile_image)) {
                        return Html::img($url,['alt'=>$data->name,  'width'=>'100px']); 
                    }
                    else{
                        $url =Url::to(['/img/userprofile.png']);
                        return Html::img($url,['alt'=>$data->name, 'width'=>'100px']); 
                    }
                    
                }
            ],
            'name',
            'mobile',
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
            'about:ntext',
            'country',
            'state',
            'city',
            'street',
            'zip',
            'created_at',
            [
                'attribute'=>'status',
                'label'=>'Status',
                'format' =>'raw',
                'value' => function($data){
                    if ($data->status == 1) 
                    {
                       return '<label class="btn btn-success mb-1">Online</label>' ;
                    }
                    elseif($data->status==0)
                    {
                     return '<label class="btn btn-info mb-1">Offline</label>';
                    }  
                }
                
            ],
        ],
    ]) ?>

</div>
<style type="text/css">
    td > img
    {
        border-radius: 20px;
    }
</style>