<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body id="app-container" class="menu-default show-spinner">
<?php 
    $this->beginBody();
  

    $loginid = \Yii::$app->util->loggedinUserId();
    if (isset($loginid)) 
    {
       $user=\app\models\User::find()->where(['id'=>$loginid])->one();
        $userdtails=\app\models\UserDetails::find()->where(['user_id'=>$loginid])->one();
        // if (!empty($user)) 
        // {
        //     $authassign=\app\models\AuthAssignment::find()->where(['user_id'=>$loginid])->one();
        // } 
    }
       
    
    ?>
<nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <div class="search" data-search-path="Layouts.Search.html?q=">
                <input placeholder="Search...">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </div>
        </div>


        <a class="navbar-logo" href="#">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <!-- <a class="btn btn-sm btn-outline-primary mr-2 d-none d-md-inline-block mb-2" href="https://1.envato.market/5kAb">&nbsp;BUY&nbsp;</a> -->

                <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="#" class="icon-menu-item">
                            <i class="iconsmind-Equalizer d-block"></i>
                            <span>Settings</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsmind-MaleFemale d-block"></i>
                            <span>Users</span>
                        </a>

                        <a href="company" class="icon-menu-item">
                            <i class="iconsmind-Puzzle d-block"></i>
                            <span>Company</span>
                        </a>

                        <a href="task" class="icon-menu-item">
                            <i class="iconsmind-Bar-Chart d-block"></i>
                            <span>Task</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsmind-File-Chart d-block"></i>
                            <span>Groups</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsmind-Suitcase d-block"></i>
                            <span>Calender</span>
                        </a>

                    </div>
                </div>
                <?php
                $notification= \app\models\Notifications::find()

                        ->where(['status' =>0])

                        ->andWhere(['created_by' => Yii::$app->user->identity->id])->orderBy([
                        'id' => SORT_DESC])->all();
                if(!empty($notification))
                {
                    $count=count($notification);
                    // print_r($notification);
                    
                }else
                {
                    $count=0;
                }
                ?>

                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell"></i>
                        <span class="count"><?=$count?></span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right mt-3 scroll position-absolute" id="notificationDropdown">
                        
                        <br/>
                        <?php if($count >0){ ?>
                        <?php foreach($notification as $notify){ ?>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="/img/profile-pic-l-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="<?=$notify->link?>">
                                        <p class="font-weight-medium mb-1"><?=$notify->title?></p>
                                        <p class="text-muted mb-0 text-small"><?=$notify->created_at?></p>
                                    </a>
                                </div>
                            </div>
                            
                            <?php } ?>
                            
                                <a class="float-right " href="# ">View All</a>
                                
                            
                        <?php }else{ ?>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="/img/profile-pic-l-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1"><?=$notify->title?></p>
                                        <p class="text-muted mb-0 text-small"><?=$notify->created_at?></p>
                                    </a>
                                </div>
                            </div>
                            
                        <?php } ?>

                            

                    </div>
                </div>

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

           <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name"><?=$userdtails->name ?></span>
                    <span >
                        <?php if (!empty($userdtails->profile_image)) { ?>
                        <img src="<?= Url::to(['/uploads/users/'.$userdtails->id.'/'.$userdtails->profile_image])?>" alt="<?= $userdtails->name?>"/>
                        <?php }else{ ?>
                        
                        <img src="/img/profile-pic-l.jpg" alt="Profile Picture" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
                            
                        <?php } ?>
                    </span>
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="<?= Url::to(['/user-details/profile']);?>"> <i class="simple-icon-note"> </i> Edit Profile</a>
                    <a class="dropdown-item" href="<?= Url::to(['/user/password']);?>"><i class="simple-icon-lock-open"> </i> Password</a>
                   
                    <a class="dropdown-item" href="<?= Url::to(['/site/logout']);?>"><i class="simple-icon-power"> </i> Sign out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li class="active">
                        <a href="<?= Url::to(['site/']);?>">
                            <i class="iconsmind-Home-4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#Company">
                            <i class="iconsmind-Building"></i>
                            <span>Company</span>
                        </a>
                    </li>  
					<li class="">
                        <a href="#Groups">
                            <i class="iconsmind-Conference"></i>
                            <span>Groups</span>
                        </a>
                    </li> 
					<li class="">
                        <a href="#Task">
                            <i class="iconsmind-Bar-Chart"></i>
                            <span>Task</span>
                        </a>
                    </li>   
					<li class="">
                        <a href="/site/calender">
                            <i class="iconsmind-Building"></i>
                            <span>Calender</span>
                        </a>
                    </li>   
                    
                    <li class="">
                        <a href="#Users">
                            <i class="iconsmind-Conference"></i>
                            <span>Users</span>
                        </a>
                    </li> 
                    <li class="">
                        <a href="#Notification">
                            <i class="iconsmind-Bell"></i>
                            <span>Notification</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#Settings">
                            <i class="simple-icon-settings"></i>
                            <span>Settings</span>
                        </a>
                    </li> 
                    <li class="">
                        <a href="#Logout">
                            <i class="iconsmind-Lock-2"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                  
                </ul>
            </div>
        </div>
        <!-- Submenu -->
        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="Users">
                    <li class="">
                        <a href="<?= Url::to(['site/create-user']);?>">
                            <i class="simple-icon-user-follow"></i> Add New User
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['site/manage-users']);?>">
                            <i class="simple-icon-user-following"></i>Manage Users
                        </a>
                    </li>
                </ul> 
                <ul class="list-unstyled" data-link="Company">
                    <li class="">
                        <a href="<?= Url::to(['company/create']);?>">
                            <i class="simple-icon-plus"></i> Create Company
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['company/']);?>">
                            <i class="simple-icon-note"></i>Manage Company
                        </a>
                    </li>
                </ul>
				<ul class="list-unstyled" data-link="Groups">
                    <li class="">
                        <a href="<?= Url::to(['groups/create']);?>">
                            <i class="simple-icon-plus"></i> Create Group
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['groups/']);?>">
                            <i class="simple-icon-note"></i>Manage Groups
                        </a>
                    </li>
                </ul>
				
				 <ul class="list-unstyled" data-link="Task">
                    <li class="">
                        <a href="<?= Url::to(['task/create']);?>">
                            <i class="simple-icon-plus"></i> Create Task
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['task/']);?>">
                            <i class="simple-icon-note"></i>Manage Task
                        </a>
                    </li>
					<li class="">
                        <a href="<?= Url::to(['group-order/create']);?>">
                            <i class="simple-icon-check"></i>Assign Task
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="Contracts">
                    <li class="">
                        <a href="<?= Url::to(['contract/create']);?>">
                            <i class="simple-icon-plus"></i> Create Contract
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['contract/']);?>">
                            <i class="simple-icon-note"></i>Manage Contracts
                        </a>
                    </li>
                </ul>  
                <ul class="list-unstyled" data-link="Assets">
                    <li class="">
                        <a href="<?= Url::to(['assets/create']);?>">
                            <i class="simple-icon-plus"></i> Create Asset
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['assets/']);?>">
                            <i class="simple-icon-note"></i>Manage Assets
                        </a>
                    </li>
                </ul> 
                <ul class="list-unstyled" data-link="Locations">
                    <li class="">
                        <a href="<?= Url::to(['location/create']);?>">
                            <i class="simple-icon-plus"></i> Create Location
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['location/']);?>">
                            <i class="simple-icon-note"></i>Manage Locations
                        </a>
                    </li>
                </ul> 
                <ul class="list-unstyled" data-link="Tickets">
                    <li class="">
                        <a href="<?= Url::to(['tickets/create']);?>">
                            <i class="simple-icon-plus"></i> Create Ticket
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= Url::to(['tickets/']);?>">
                            <i class="simple-icon-note"></i>Manage Tickets
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   <main class="default-transition" style="opacity: 1;">
       <style>
       .breadcrumb {
            background-color: transparent;
            margin-bottom: -0.5rem !important;
        }
        i{
            font-style: normal !important;
        }
       i > a {
           margin-right:12px;
       }
       .breadcrumb-item > i , .breadcrumb{
           padding:0 !important;
       }
       .dashboard-quick-post {
    min-height: auto !important;
}
.help-block{
    color:red !important
}
.card-top-buttons {
    padding: 0 !important;
    right: -23px !important;
    top: -10px !important;
}
.btn-header-light:hover {
    background-color: transparent;
     border: none !important;
}
.btn-header-light {
    background-color: transparent;
     border: none !important;
}
.has-error > label > span
{
    color:red;
}.has-error > label
{
    color:red;
}

.has-error > label >input
{
    border-color: red !important;
    border: solid 0.5px red !important;
}
.has-success > label > span
{
    color:green;
}.has-success > label
{
    color:green;
}

.has-success > label >input
{
    border-color: green !important;
    border: solid 0.5px green !important;
}
.form-control{
   
    color: #212121 !important;
    opacity: 1 !important;/* Firefox */
}
.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: black !important;
  opacity: 1 !important;/* Firefox */
}

.form-control::-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: black !important;
}

.form-control::-ms-input-placeholder { /* Microsoft Edge */
  color: black !important;
}
.kv-file-remove , .kv-file-zoom {
    display:none !important;
} 
.btn-file input[type=file] {
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100% !important;
    text-align: right;
    opacity: 0 !important;
    background: none repeat scroll 0 0 transparent !important;
    cursor: inherit;
    display: block;
}
       </style>
       <?= \odaialali\yii2toastr\ToastrFlash::widget([
                    'options' => [
                        'positionClass' => 'toast-top-right'
                    ]
                ]);?>
          <?=$content ?>
    </main>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<style type="text/css">
	a.card {
	    box-shadow: 2px 2px 1px 1px #c1c1c1;
	}
	.navbar .navbar-logo .logo {
    width: 110px;
    height: 60px;
    background: url(../img/techuire.png) no-repeat;
    background-position: 50%;
    margin: 0 auto;
}
.breadcrumb {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    font-size: small;
    padding: .75rem 1rem;
    margin-bottom: 1rem;
    list-style: none;
    background-color: none;
    border-radius: .25rem;
}
.bootstrap-tagsinput, .form-control {
    border-radius: .1rem;
    outline: initial!important;
    box-shadow: none !important;
    font-size: .8rem;
    padding: .75rem .75rem .5rem;
    line-height: 2.5;
    border: 1px solid #d7d7d7;
   
    color: #212121;
    min-height: 45px !important;
}
.logo-single {
    width: 140px !important;
    height: 35px;
    background: url(../img/logo-black.svg) no-repeat;
    background-position: 50%;
    margin-bottom: 60px;
}
</style>
