<?php
	
	use app\widgets\Alert;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use app\assets\AppAsset;
	
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

<body>
<?php $this->beginBody() ?>
<header>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<a href="<?= Url::to(['/']) ?>"><h1><span>Com</span>pany</h1></a>
					</div>
				</div>
				
				<div class="navbar-collapse collapse">
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="<?= Url::to(['/']) ?>" class="active">Home</a></li>
							<li role="presentation"><a href="<?= Url::to(['/site/about']) ?>">About Us</a></li>
							<li role="presentation"><a href="<?= Url::to(['/employee/index']) ?>">Team</a></li>
							<li role="presentation"><a href="<?= Url::to(['/site/contact']) ?>">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>

<?= $content; ?>

<footer>
    <div class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Company Theme. All Rights Reserved.
            </div>
        </div>

        <div class="pull-right">
            <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>