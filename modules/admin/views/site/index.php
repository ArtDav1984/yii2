<?php
	$this->title = 'Admin';
?>

<nav id="sidebar">
	<div class="sidebar-header">
		<h3>Admin Sidebar</h3>
	</div>
	
	<ul class="list-unstyled components">
		<p>Companies</p>
		<?php foreach ($companies as $company) : ?>
		<li class="active">
			<a href="#<?= $company['id']; ?>" data-toggle="collapse" aria-expanded="false"><?= $company['name']; ?></a>
			<ul class="collapse list-unstyled" id="<?= $company['id']; ?>">
				<li><a href='/admin/employee/index/?id=<?= $company['id'] ?>'>To Manage Employees</a></li>
                <li><a href='/admin/skill/index/?id=<?= $company['id'] ?>'>To Manage Skills</a></li>
                <li><a href='/admin/salary/index/?id=<?= $company['id'] ?>'>To Manage Salary</a></li>
			</ul>
		</li>
		<?php endforeach; ?>
	</ul>
</nav>



