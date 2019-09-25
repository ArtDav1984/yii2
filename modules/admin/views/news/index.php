<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;



$this->title = 'News';
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>Count: <?= count($news); ?></p>

    <table class="table-bordered table-striped table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th colspan="3">Actions</th>
        </tr>
		<?php foreach ($news as $item): ?>
            <tr>
                <td><?= $item->id; ?></td>
                <td><?= $item->title; ?></td>
                <td> <?= Html::a('<i class="fa fa-eye">', ['view', 'id' => $item['id']]) ?></td>
                <td> <?= Html::a('<i class="fa fa-pencil-square-o">', ['update', 'id' => $item['id']]) ?></td>
                <td><?= Html::a('<i class="fa fa-times"></i>', ['delete', 'id' => $item['id']], [   'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
					]) ?></td>
            </tr>
		<?php endforeach; ?>
    </table>
	
	<?= LinkPager::widget([
		'pagination' => $pagination,
	]); ?>


</div>
