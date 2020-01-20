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
        <a  href="<?= Url::to(['/admin/site/view', 'id' => $company['id']]) ?>">
        <div class="square-service-block companies_block">
                <div class="ssb-icon">
                    <?= Html::img(Url::to('@web/img/companies/'.$company['image']))?>
                </div>
                <h2 class="ssb-title"><?= $company['name']; ?></h2>
        </div>
        </a>
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

    <table id="myTable" class="tablesorter">
        <thead>
        <tr>
            <th>Account #</th>
            <th>Difference</th>
            <th>3: Ratings (max)</th>
            <th>4: Ratings (min)</th>
            <th class="string-max">5: Change (max)</th>
            <th class="string-min">6: Change (min)</th>
            <th class="string-top">7: Change (top)</th>
            <th class="string-bottom">8: Change (bottom)</th>
            <th class="string-none">9: Change (zero)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>A43</td>
            <td>-35</td>
            <td>01</td>
            <td>01</td>
            <td>-.1</td>
            <td>-.1</td>
            <td>-.1</td>
            <td>-.1</td>
            <td>-.1</td>
        </tr>
        <tr>
            <td>A255</td>
            <td>33</td>
            <td>02</td>
            <td>02</td>
            <td>N/A #1</td>
            <td>N/A #1</td>
            <td>N/A #1</td>
            <td>N/A #1</td>
            <td>N/A #1</td>
        </tr>
        <tr>
            <td>A33</td>
            <td>2</td>
            <td>03</td>
            <td>03</td>
            <td>N/A #2</td>
            <td>N/A #2</td>
            <td>N/A #2</td>
            <td>N/A #2</td>
            <td>N/A #2</td>
        </tr>
        <tr>
            <td>A1</td>
            <td>-5</td>
            <td>04</td>
            <td>04</td>
            <td>-8.4</td>
            <td>-8.4</td>
            <td>-8.4</td>
            <td>-8.4</td>
            <td>-8.4</td>
        </tr>
        <tr>
            <td>A102</td>
            <td>99</td>
            <td>05</td>
            <td>05</td>
            <td>-2.2</td>
            <td>-2.2</td>
            <td>-2.2</td>
            <td>-2.2</td>
            <td>-2.2</td>
        </tr>
        <tr>
            <td>A10</td>
            <td>-1</td>
            <td>06</td>
            <td>06</td>
            <td>97.4</td>
            <td>97.4</td>
            <td>97.4</td>
            <td>97.4</td>
            <td>97.4</td>
        </tr>
        <tr>
            <td>A02</td>
            <td>0</td>
            <td>07</td>
            <td>07</td>
            <td>23.6</td>
            <td>23.6</td>
            <td>23.6</td>
            <td>23.6</td>
            <td>23.6</td>
        </tr>
        <tr>
            <td>A55</td>
            <td>44</td>
            <td></td>
            <td></td>
            <td>11.4</td>
            <td>11.4</td>
            <td>11.4</td>
            <td>11.4</td>
            <td>11.4</td>
        </tr>
        <tr>
            <td>A87</td>
            <td>04</td>
            <td>NR</td>
            <td>NR</td>
            <td>5.2</td>
            <td>5.2</td>
            <td>5.2</td>
            <td>5.2</td>
            <td>5.2</td>
        </tr>
        <tr>
            <td>A012</td>
            <td></td>
            <td>NR</td>
            <td>NR</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="/path/to/jquery-latest.js"></script>
<script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script>

<!-- tablesorter widgets (optional) -->
<script type="text/javascript" src="/path/to/jquery.tablesorter.widgets.js"></script>

<?php
$script = <<< JS
$ ( function () {   
    $ ( "#myTable" ).tablesorter (); 
}); 
JS;
$this->registerJs($script);
?>



