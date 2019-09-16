<?php
    
    use yii\helpers\Html;
    use yii\helpers\Url;
    
	$this->title = 'Admin';
?>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</div>

<div class="row">
    <h2>Companies</h2>
    <?php foreach ($companies as $company) : ?>
        <div class="col-md-3">
        <div class="square-service-block">
                <div class="ssb-icon">
                    <?= Html::img(Url::to('@web/img/companies/'.$company['img_path']))?>
                </div>
                <h2 class="ssb-title"><?= $company['name']; ?></h2>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <h2>Quantity</h2>
    <div class="col-md-3">
        <div class="square-service-block">
            <div class="ssb-icon"><?= $departmentsCount; ?></div>
            <h2 class="ssb-title">Departments</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="square-service-block">
                <div class="ssb-icon"> <?= $employeesCount; ?> </div>
                <h2 class="ssb-title">Employees</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="square-service-block">
                <div class="ssb-icon"><?= $skillsCount; ?></div>
                <h2 class="ssb-title">Skills</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="square-service-block">
            <div class="ssb-icon"><?= $monthlySalary; ?> AMD</div>
            <h2 class="ssb-title">Monthly salary</h2>
        </div>
    </div>
</div>



