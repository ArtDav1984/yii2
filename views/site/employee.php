<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	
	$this->title = 'Team';
?>
<div id="breadcrumb">
	<div class="container">
		<div class="breadcrumb">
			<li><a href="<?= Url::to(['/']) ?>">Home</a></li>
			<li>Team</li>
		</div>
	</div>
</div>

<div class="our-team">
	<div class="container">
		<h3>Our Team</h3>
        <?php foreach ($employees as $employee) : ?>
		<div class="text-center">
			<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<?= Html::img(Url::to(['@web/uploads/employees/'.$employee['image']])) ?>
				<h4><?= $employee->first_name.' '.$employee->last_name ?></h4>
				<h5>Company: <?= $employee->companies['name'] ?></h5>
				<h5>Department: <?= $employee->departments['name'] ?></h5>
				<h5>Skill:
					<?php $employeesSkills = $employee->employeesSkills; ?>
					<?php
						$skills = '';
						foreach ($employeesSkills as $employeesSkill):
							?>
							<?php  $skills.=$employeesSkill['skills']['name'].', ' ?>
						<?php endforeach;
						$skills = rtrim($skills,', ');
						echo $skills;
					?>
                </h5>
                <a href="<?= Url::to(['/employee/view', 'id' => $employee['id']]) ?>" class="btn btn-success">View</a>
			</div>
		</div>
        <?php endforeach; ?>
	</div>
    <div class="team_pagination">
		<?= LinkPager::widget([
			'pagination' => $pagination,
		]); ?>
    </div>
</div>
