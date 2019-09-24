<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Home';
?>
<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2 class="animation animated-item-1">Welcome <span>Company</span></h2>
                                <p class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</p>
                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
	                            <?= Html::img(Url::to('@web/img/template/slider/img3.png'),
                                    ['class' => 'skill_image'])
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.item-->
        </div>
        <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
</section>
<!--/#main-slider-->

<div class="about">
    <div class="container">
        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>about us</h2>
	        <?= Html::img(Url::to('@web/img/template/6.jpg'),
		        ['class' => 'img-responsive'])
	        ?>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            </p>
        </div>

        <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <h2>Lates News</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
                libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque </p>
        </div>
    </div>
</div>


<section id="partner">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Our Partners</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="partners">
            <ul>
                <li>
                    <a href="#">
                        <?= Html::img(Url::to(['@web/img/template/partners/partner1.png']),
                            ['class' => 'img-responsive wow fadeInDown', 'data-wow-duration' => '1000ms',
                             'data-wow-delay' => '300ms'])
                        ?>
                    </a>
                </li>
                <li>
                    <a href="#">
			            <?= Html::img(Url::to(['@web/img/template/partners/partner2.png']),
				            ['class' => 'img-responsive wow fadeInDown', 'data-wow-duration' => '1000ms',
				             'data-wow-delay' => '300ms'])
			            ?>
                    </a>
                </li>
                <li>
                    <a href="#">
			            <?= Html::img(Url::to(['@web/img/template/partners/partner3.png']),
				            ['class' => 'img-responsive wow fadeInDown', 'data-wow-duration' => '1000ms',
				             'data-wow-delay' => '300ms'])
			            ?>
                    </a>
                </li>
                <li>
                    <a href="#">
			            <?= Html::img(Url::to(['@web/img/template/partners/partner4.png']),
				            ['class' => 'img-responsive wow fadeInDown', 'data-wow-duration' => '1000ms',
				             'data-wow-delay' => '300ms'])
			            ?>
                    </a>
                </li>
                <li>
                    <a href="#">
			            <?= Html::img(Url::to(['@web/img/template/partners/partner5.png']),
				            ['class' => 'img-responsive wow fadeInDown', 'data-wow-duration' => '1000ms',
				             'data-wow-delay' => '300ms'])
			            ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--/.container-->
</section>
<!--/#partner-->

