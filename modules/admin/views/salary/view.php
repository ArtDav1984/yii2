<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	
	/* @var $this yii\web\View */
	
	$this->title = 'View';
	\yii\web\YiiAsset::register($this);
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/admin']) ?>">Dashboard</a></li>
        <li><a href="<?= Url::to(['/admin/salary/index']) ?>">Salaries</a></li>
        <li class="active"><?= $this->title; ?></li>
    </ol>
</div>
<div class="salary-view">

    <h1><?= Html::encode('Salary: '.$salary->employees['first_name']).' '.$salary->employees['last_name'] ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $salary->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('History', ['history', 'id' => $salary->employees['id']], ['class' => 'btn btn-primary']) ?>
    </p>

    <table class="table-admin-small table-bordered table-striped table">
        <tr>
            <td><b>ID</b></td>
            <td><?= $salary->id; ?></td>
        </tr>
        <tr>
            <td><b>Created AT</b></td>
            <td><?= $salary->created_at; ?></td>
        </tr>
        <tr>
            <td><b>Salary</b></td>
            <td><?= $salary->salary; ?></td>
        </tr>
        <tr>
            <td><b>Employee</b></td>
            <td><?= $salary->employees['first_name'].' '.$salary->employees['last_name']; ?></td>
        </tr>
    </table>

</div>
