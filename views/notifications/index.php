<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifications';
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
    <div class="separator mb-5"></div>

    <div class="row">
    
        <div class="col-12 col-lg-12">
            <div class="mb-2">
                <h1><?=$this->title?></h1>
                
            </div>
            
                <div class="row  icon-cards-row mb-2">                          
            
    <?= 
        ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_notifications',
                'layout' => "{items}{pager}",
                'itemOptions' => [
                  'class' => 'col-md-6 col-lg-6 col-sm-12 mb-2',
                ],
                'options' => [
                'tag' => false,
                'class' =>"col-md-12"
                
                ],  
            'pager' => [
                'options' => ['class' => 'pager'],
                'nextPageLabel' => 'Next',
                'prevPageLabel' => 'Prev',
                'maxButtonCount' => 6,
                'nextPageCssClass' =>'next-page',
                'prevPageCssClass' =>'per-page',
                
            ],
            'emptyText'=>'You Have No Unit Created Yet Please Add New Unit By Clicking on Add New Unit Button'
        ]); 
    ?>

            
                
        
            
            </div>
        </div>
    </div>
</div>