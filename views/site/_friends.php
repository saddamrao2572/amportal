<?php

use yii\helpers\Url;
?>
<div class="card">
				<div class="card-body">
					<h5 class="card-title">Friends Circles</h5>
					
					<div class=" list">
						<?php
							$friends=app\models\User::find()->where(['status'=>1])->limit(30)->all();
							if(isset($friends)&& !empty($friends))
							{
								foreach($friends as $frnd)
								{
									?>
														
									<div class="d-flex flex-row mb-3 pb-3 border-bottom">
										<a href="#">
											<img src="/img/profile-pic-l.jpg" alt="Profile Picture" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall">
										</a>
										<div class="pl-3 pr-2">
											
												<p class="font-weight-medium mb-0 " data-line="1">	
													<small style="
														font-size: 15px;"  class="text-success"><i class="simple-icon-check">
														</i>
													</small>
												<?=$frnd->username?> 
												
													
												<?php
												if(isset($frnd->getFriends()->status) && $frnd->getFriends()->status=='0' )
												{
													echo '<br/>Already Requested.';
												}elseif(isset($frnd->getFriends()->status) && $frnd->getFriends()->status=='1' )
												{
													echo '<br/>Already Friends.';
												}elseif(isset($frnd->getFriends()->status) && $frnd->getFriends()->status=='2' )
												{
													echo '<br/>Blocked!';
													
												}else{
													?>
													<br/>
														<a href="<?=url::to(['friends/create?id='.Yii::$app->util->encrypt($frnd->id)])?>" class=" text-primary" >
															<i class="simple-icon-user-follow"></i>
															Send Request
														
														</a>
													<br/>
													<p class="fmb-1 text-muted text-small" data-line="1">	
													You Can Send Request 
													</p>
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