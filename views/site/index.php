<?php

/* @var $this yii\web\View */

$this->title = 'Nest Securities';
?>
<div class="site-index">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-lg-offset-2">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="item active">
                            <blockquote>
                                <p style="font-size: smaller;">"A stock is not just a ticker symbol or an electronic
                                    blip it is an ownership interest
                                    in an actual business,with an underlying value that does not depend on its share
                                    price."</p>
                                <small>Benjamin Graham</small>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote>
                                <p>"Know what you own, and know why you own it."</p>
                                <small>Peter Lynch</small>
                            </blockquote>
                        </div>
                        <div class="item">
                            <blockquote>
                                <p>"The individual investor should act consistently as an investor and not as a
                                    speculator."
                                </p>
                                <small> Benjamin Graham</small>
                            </blockquote>
                        </div>
                    </div>

                </div>

                    <div class="row text-center">
                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-10 text-center">
                            <canvas id="myChart" width="75%" height="75%"></canvas>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-8  col-xs-10 text-center">
                            <canvas id="chart-area" width="60%" height="60%"></canvas>
                        </div>
                    </div>


            </div>
        </div>

    </div>
</div>

        <?php
        $js = <<<JS
		var config = {
			type: 'line',
			data: {
				labels: ['2013', '2014', '2015','2016', '2017'],
				datasets: [{
					label: 'Your Results',
					backgroundColor: 'blue',
					borderColor: 'blue',
					data: [
					123,140,180,230,280
					],
					fill: false,
				}]
			},
			options: {
				//responsive: true,
				title: {
					display: true,
					text: 'Trends'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Year'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		var config_pie = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
					120,350,300,234,190
					],
					backgroundColor: [
						'red',
						'orange',
				        'yellow',
						'green',
						'blue',
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		};

		
			var ctx_pie = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx_pie, config_pie);
				var ctx = document.getElementById('myChart').getContext('2d');
			window.myLine = new Chart(ctx, config);
		
		
		




	
		
JS;
        Yii::$app->view->registerJs($js, \yii\web\View::POS_READY);
        ?>

