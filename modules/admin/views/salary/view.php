<?php
	
	use yii\helpers\Html;
	
	/* @var $this yii\web\View */
	
	$this->title = 'View';
	\yii\web\YiiAsset::register($this);
?>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/salary/index">Salaries</a></li>
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
            <td><?php echo $salary->id; ?></td>
        </tr>
        <tr>
            <td><b>Created AT</b></td>
            <td><?php echo $salary->created_at; ?></td>
        </tr>
        <tr>
            <td><b>Salary</b></td>
            <td><?php echo $salary->salary; ?></td>
        </tr>
        <tr>
            <td><b>Employee</b></td>
            <td><?php echo $salary->employees['first_name'].' '.$salary->employees['last_name']; ?></td>
        </tr>
    </table>

</div>
