<?php
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
                <div class="ssb-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                <h2 class="ssb-title"><?= $company['name']; ?></h2>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <h2>Quantity</h2>
    <div class="col-md-3">
        <div class="square-service-block">
            <a href="#">
                <div class="ssb-icon"> <?= $employeesCount; ?> </div>
                <h2 class="ssb-title">Employees</h2>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="square-service-block">
            <a href="#">
                <div class="ssb-icon"><?= $departmentsCount; ?></div>
                <h2 class="ssb-title">Departments</h2>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="square-service-block">
            <a href="#">
                <div class="ssb-icon"><?= $skillsCount; ?></div>
                <h2 class="ssb-title">Skills</h2>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="square-service-block">
            <a href="#">
                <div class="ssb-icon"><?= $citiesCount; ?></div>
                <h2 class="ssb-title">Cities</h2>
            </a>
        </div>
    </div>
</div>



