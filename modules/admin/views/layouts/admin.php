<?php
	
	/* @var $this \yii\web\View */
	/* @var $content string */
	
	use yii\helpers\Html;
	use app\assets\AppAssetAdmin;
	
	AppAssetAdmin::register($this);
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
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>


<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                            alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-role">Administrator</span>
                    <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>Menagment</span>
                    </li>
                    <li>
                        <a href="/admin">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/employee/index">
                            <span>Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/skill/index">
                            <span>Skills</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/salary/index">
                            <span>Salaries</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/development/index">
                            <span>Developments</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <!-- BRAND -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#alignment-example" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/admin">Your Brand</a>
                    </div>

                    <!-- COLLAPSIBLE NAVBAR -->
                    <div class="collapse navbar-collapse" id="alignment-example">

                        <!-- Links -->
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>

                        <!-- Search -->
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>

                    </div>

                </div>
            </nav>
        </div>
        <?= $content; ?>
    </main>
    <!-- page-content" -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
