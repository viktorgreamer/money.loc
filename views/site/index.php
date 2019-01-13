<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="container" style="padding-left: 150px;font-size: 30px">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!— Carousel indicators —>
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!— Wrapper for carousel items —>
            <div class="carousel-inner">
                <div class="item active">
                    <div>“A stock is not just a ticker symbol or an electronic blip;<br> it is an ownership interest in an
                        actual business,<br> with an underlying value that does not depend on its share price.” - Benjamin
                        Graham
                    </div>
                </div>
                <div class="item">
                    <div style="padding-left: 10px">"Know what you own, and know why you own it." - Peter Lynch</div>
                </div>
                <div class="item">
                    <div>"The individual investor should act consistently as an investor <br>and not as a speculator." -
                        Benjamin Graham
                    </div>
                </div>
            </div>
            <!— Carousel controls —>
            <!— <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>-->
        </div>
    </div>

</div>