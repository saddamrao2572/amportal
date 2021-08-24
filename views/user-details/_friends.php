<?php

use yii\helpers\Url;
?>
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Friends Circles</h5>
		
		<div class=" list">
			<?php
			$loginid = \Yii::$app->util->loggedinUserId();
				$friends=app\models\User::find()->where(['status'=>1])->limit(30)->all();
				if(isset($friends)&& !empty($friends))
				{
					foreach($friends as $frnd)
					{
						 $statuscheck=\app\models\Friends::find()->where(['requested_to'=>$frnd->id,'requested_by'=>$loginid])->one();
						 $userdetails=\app\models\UserDetails::find()->where(['user_id'=>$frnd->id])->one();
						
						?>
											
						<div class="d-flex flex-row mb-3 pb-3 border-bottom">
							<a href="#" class="d-block position-relative">
								<img src="/img/profile-pic-l.jpg" alt="Profile Picture" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
								<?php 
								if ($frnd->active==1) { ?>
								<span class="badge badge-pill badge-theme-1 position-absolute badge-top-right me">.</span>
								<?php } ?>
							</a>
							<div class="pl-3 pr-2">
								
									<p class="font-weight-medium mb-0 " data-line="1">
									<b><?=$userdetails->name?></b> 

									<?php
									if(isset($statuscheck->status) && $statuscheck->status=='0' )
									{
										?>
										<br/>
											<a href="<?=url::to(['friends/delete?id='.Yii::$app->util->encrypt($statuscheck->id)])?>" class="btn btn-warning btn-xs mb-1" >
												<i class="simple-icon-close"></i>
												Cancel Request
											</a>
										<br/>
										<?php
									}elseif(isset($statuscheck->status) && $statuscheck->status=='1' )
									{
										?>
										<br/>
											<a href="<?=url::to(['friends/delete?id='.Yii::$app->util->encrypt($statuscheck->id)])?>" class="btn btn-warning btn-xs mb-1" >
												<i class="simple-icon-user-unfollow"></i>
												Unfriend
											</a>
											<a href="<?=url::to(['friends/block?id='.Yii::$app->util->encrypt($statuscheck->id)])?>" class="btn btn-danger btn-xs mb-1" >
												<i class="simple-icon-close"></i>
												Block
											</a>
										<br/>
										<?php
									}elseif(isset($statuscheck->status) && $statuscheck->status=='2' )
									{
										?>
										<br/>
											<a href="<?=url::to(['friends/unblock?id='.Yii::$app->util->encrypt($statuscheck->id)])?>" class="btn btn-secondary btn-xs mb-1" >
												<i class="simple-icon-user-follow"></i>
												Unblock
											</a>
										<br/>
										
										<?php
									}elseif(empty($statuscheck)){
										?>
										<br/>
											<a href="<?=url::to(['friends/create?id='.Yii::$app->util->encrypt($frnd->id)])?>" class="btn btn-success btn-xs mb-1" >
												<i class="simple-icon-user-follow"></i>
												Send Request
											</a>
										<br/>
										
										<?php
										
									}

									?>
									</p>
										
									
									
								
							</div>
						</div>
						<?php
						
					}	
				}
				


			?>

		</div>

	</div>
</div>

<style type="text/css">
	.me
	{
	    top: 26px !important;
	    right: 22px !important;
	    font-size: 0px !important;
	    border: 3px solid !important;
	    padding: 7px !important;
	}
</style>