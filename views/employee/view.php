<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	
	$this->title = $employee->first_name.' '.$employee->last_name;
?>
<div id="breadcrumb">
	<div class="container">
		<div class="breadcrumb">
			<li><a href="<?= Url::to(['/']) ?>">Home</a></li>
			<li>Team</li>
		</div>
	</div>
</div>


<div class="team">
	<div class="container">
        <div class="team-view wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h3><?= $this->title; ?></h3>
            <hr>
            <div class="col-md-5">
               <?= Html::img(Url::to(['@web/uploads/employees/'.$employee->image]), ['class' => 'view-image']) ?>
            </div>
            <div class="col-md-7">
                <h5>Company: <?= $employee->companies['name'] ?></h5>
                <h5>Department: <?= $employee->departments['name'] ?></h5>
                <h5>Skill:
                    <?php $employeesSkills = $employee->employeesSkills ?>
	                <?php
		                $skills = '';
		                foreach ($employeesSkills as $employeesSkill):
			                ?>
			                <?php  $skills .= $employeesSkill['skills']['name'].', ' ?>
		                <?php endforeach;
		                $skills = rtrim($skills,', ');
		                echo $skills;
	                ?>
                </h5>
                <h5>Birthday: <?= $employee->birthday ?></h5>
                <h5>Age: <?= $employee->age ?></h5>
                <h5>Gender: <?= $employee->gender ?></h5>
                <h5>City: <?= $employee->city ?></h5>
                <h5>Address: <?= $employee->address ?></h5>
                <h5>Phone Number: <?= $employee->phone_number ?></h5>
                <h5>Email: <?= $employee->email ?></h5>
                <h5>Salary: <?= $employee->salaries['salary'].' AMD' ?></h5>
            </div>
        </div>
	</div>
</div>
