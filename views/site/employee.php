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
        <div class="text-center">
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <?= Html::img(Url::to(['@web/img/template/services/1.jpg'])) ?>
                <h4>John Doe</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
            </div>
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <?= Html::img(Url::to(['@web/img/template/services/2.jpg'])) ?>
                <h4>John Doe</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
            </div>
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                <?= Html::img(Url::to(['@web/img/template/services/3.jpg'])) ?>
                <h4>John Doe</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
            </div>
        </div>
    </div>
</div>