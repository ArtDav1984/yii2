<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	
	$this->title = 'Create News';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/news/index']) ?>">News</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="skill-create">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?= $this->render('_form', compact('news')); ?>

</div>
