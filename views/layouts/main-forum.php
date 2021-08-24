<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetMain;
use yii\helpers\Url;
AppAssetMain::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <?= Html::csrfMetaTags() ?>
    <?php
		$title = \Yii::$app->name;
		if(!empty($this->title)) {
			$title = $title . ' | ' . $this->title;
		}
	?>
    <title><?= Html::encode($title ) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<div class="page-wrapper">
		<header class="header header-minimal">
			<div class="header-wrapper">
				<div class="container-fluid">
					<div class="header-inner">
						<div class="header-logo">
							<a href="<?= Url::to(['/']) ?>">
								<img src="/img/liftezylogo-trans.png" alt="Logo">
							</a>
						</div><!-- /.header-logo -->

						<div class="header-content">
							
							<div class="header-bottom">
								

								<ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
									<li class="">
										<a href="<?= Url::to(['/']) ?>">Home</i></a>
									</li>
									<li class="">
										<a href="<?= Url::to(['/gym/listing']) ?>">Search</a>
									</li>
									
									<li class="">
										<a href="<?= Url::to(['/forum/post']) ?>">Forum</a>
									</li>
									<li class="">
										<a href="<?= Url::to(['/site/contact']) ?>">Contact</a>
									</li>
									<?php if(\Yii::$app->user->isGuest) {?>
										<li><a href="<?= Url::to(['/site/login']) ?>">Login</a></li>
										<li><a href="<?= Url::to(['/site/register']) ?>">Register</a></li>
									<?php } ?>
								</ul>
								<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="header-nav-user">
									<?php if(!\Yii::$app->user->isGuest) {?>
										<div class="dropdown">
											<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												<span class="header-nav-user-name"><?= \Yii::$app->util->fullName ?></span> <i class="fa fa-chevron-down"></i>
											</button>

											<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												<li><a href="<?= Url::to(['/user/profile']) ?>">Profile</a></li>
												<li><a href="<?= Url::to(['/gym']) ?>">Listings</a></li>
												<li><a href="<?= Url::to(['/site/logout']) ?>">Logout</a></li>
											</ul>
										</div><!-- /.dropdown -->
									<?php }  ?>
										
									

								</div><!-- /.header-nav-user -->
							</div><!-- /.header-bottom -->
						</div><!-- /.header-content -->
					</div><!-- /.header-inner -->
				</div><!-- /.container -->
			</div><!-- /.header-wrapper -->
			<div class="header-statusbar">
				<div class="header-statusbar-inner">
					<div class="header-statusbar-left">
						<h1>LiftEzy Forums</h1>
						<div class="display-inline-block">
							<div class="hidden-xs visible-lg">
							<form action="<?= Url::to(['/forum/post/search']) ?>" method="post">
								<div class="header-statusbar-search">
									<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
									<input type="text"  class="searchBtn form-control" name="term" placeholder="Search for topics...">
									<input type="submit" hidden="true" />
								</div><!-- /.header-search -->
							</form>
							</div>
						</div>
					</div>
					<div class="header-statusbar-right">
					<?php if(\Yii::$app->user->isGuest) {?>
						<div class="hidden-xs visible-lg"  data-toggle="tooltip" title="Login to start a new topic">
							<button class="btn btn-primary btn-lg">Start New Topic</button>
						</div>
					<?php } else {?>
						<div class="hidden-xs visible-lg " >
							<a href="<?= Url::to(['/forum/post/create']) ?>" class="btn btn-primary btn-lg">Start New Topic</a>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</header><!-- /.header -->
		<div class="main">
			<div class="main-inner">
				<div class="container-fluid">
					<?= \odaialali\yii2toastr\ToastrFlash::widget([
						'options' => [
							'positionClass' => 'toast-top-right'
						]
					]);?>
					<div class="row">
						<div class="col-sm-7 col-lg-8 col-xs-12">
							<div class="content">
								<?= $content ?>	
							</div><!-- /.content -->
						</div><!-- /.col-* -->
						<div class="col-sm-5 col-lg-4 col-xs-12">
							<!-- display categories widget -->
							<?= $this->render('@app/modules/forum/views/post/_categories') ?>
							<?php if(!\Yii::$app->user->isGuest) : ?>
							<!-- display categories widget -->
							<?= $this->render('@app/modules/forum/views/post/_mytopics') ?>
							<?php endif; ?>
						</div><!-- /.col-* -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.main-inner -->
		</div><!-- /.main -->
		<footer class="footer">
			

		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-left">
					&copy; 2017 All rights reserved.<a href="#">Liftezy</a>.
				</div><!-- /.footer-bottom-left -->

				<div class="footer-bottom-right">
					<ul class="nav nav-pills">
						<li><a href="javascript://">About</a></li>
						<li><a href="javascript://">Terms</a></li>
						<li><a href="javascript://">Privacy</a></li>
						<li><a href="javascript://">Sitem</a></li>
						<li><a href="javascript://">Advertising</a></li>
						<li><a href="javascript://">Contact</a></li>
					</ul><!-- /.nav -->
				</div><!-- /.footer-bottom-right -->
			</div><!-- /.container -->
		</div>
	</footer><!-- /.footer -->
</div><!-- /.page-wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
$(document).ready(function() {

  $('.searchBtn').keydown(function(event) {
    if (event.keyCode == 13) {
      this.form.submit();
      return false;
    }
  });

});
</script>