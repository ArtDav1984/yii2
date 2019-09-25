<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	
    $this->title = 'View';
	\yii\web\YiiAsset::register($this);

?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/news/index']) ?>">News</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="employee-view">

    <h1><?= Html::encode($news->title) ?></h1>

    <p>
		<?= Html::a('Update', ['update', 'id' => $news->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $news->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
    </p>

    <table class="table-admin-small table-bordered table-striped table">
        <tr>
            <td><b>ID</b></td>
            <td><?= $news->id; ?></td>
        </tr>
        <tr>
            <td><b>Title</b></td>
            <td><?= $news->title; ?></td>
        </tr>
        <tr>
            <td><b>Body</b></td>
            <td><?= $news->body; ?></td>
        </tr>
    </table>

</div>