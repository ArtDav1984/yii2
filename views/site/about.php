<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'About';
?>
<div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
            <li><a href="<?= Url::to(['/']) ?>">Home</a></li>
            <li>About Us</li>
        </div>
    </div>
</div>

<div class="aboutus">
    <div class="container">
        <h3>Our company information</h3>
        <hr>
        <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <?= Html::img(Url::to(['@web/img/template/7.jpg']), ['class' => 'img-responsive']) ?>
            <h4>We Create, Design and Make it Real</h4>
            <p>Nam tempor velit sed turpis imperdiet vestibulum. In mattis leo ut sapien euismod id feugiat mauris euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus id nulla risus, vel tincidunt
                turpis. Aliquam a nulla mi, placerat blandit eros. </p>
            <p>In neque lectus, lobortis a varius a, hendrerit eget dolor. Fusce scelerisque, sem ut viverra sollicitudin, est turpis blandit lacus, in pretium lectus sapien at est. Integer pretium ipsum sit amet dui feugiat vitae dapibus odio eleifend.</p>
        </div>
        <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="skill">
                <h2>Our Skills</h2>

                <?php foreach ($skills as $skill) : ?>
                <div class="progress-wrap row">
                    <div class="col-md-2">
                    <?= Html::img(Url::to(['@web/uploads/skills/'.$skill['image']]), ['class' => 'skills_brand']) ?>
                    </div>
                    <div class="col-md-10">
                    <h4><?= $skill['name'] ?></h4>
                    </div>
                </div>
                <?php endforeach; ?>
	
	            <?= LinkPager::widget([
		            'pagination' => $pagination,
	            ]); ?>
                
            </div>
        </div>
    </div>
</div>
