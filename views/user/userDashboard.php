<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
?>
<div class="container">
<div class='row'>
	<div class='col-md-12'>
		<div class='page-title'>
			<h1>Dashboard</h1>
		</div><!-- /.page-title-* -->
	</div><!-- /.col-* -->
</div><!-- /.row -->

<div class='row'>
    <div class='col-md-12'>
		<div class='card-box'>
			<h2>Graph For Gym Views Over Months</h2>
			<?= ChartJs::widget([
				'type' => 'bar',
				'options' => [
					'height' => 150,
					'width' => 400,
					'scales' => [
						'yAxes' => [
							'ticks' => [ 
								'stepSize' => 1
							]
						],
					],
				],
				
				'data' =>[
					'labels' => $finalMonths,
					'datasets' =>
					[
						[
							'label' => 'Viewers',
							'fill' => true,
							'backgroundColor' => [
								'rgba(255, 99, 132, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)',
								'rgba(153, 102, 255, 0.2)',
								'rgba(255, 159, 64, 0.2)'
							],
							'borderColor' => 'rgba(179,181,198,1)',
							'pointBackgroundColor' => 'rgba(179,181,198,1)',
							'pointBorderColor' => '#fff',
							'pointHoverBackgroundColor' => '#fff',
							'pointHoverBorderColor' => 'rgba(179,181,198,1)',
							'hoverBackgroundColor' => '#ffb3b3',
							'data' => $finalArrayViews
						],
					],
				],			
			]);
		?>
		</div>
	</div>
</div>

<div class='row'>
    <div class='col-md-12'>
		<div class='card-box'>
			<h2>Graph For Gym Likes Over Months</h2>
			<?= ChartJs::widget([
				'type' => 'bar',
				'options' => [
					'height' => 150,
					'width' => 400,
					'scales' => [
						'yAxes' => [
							'ticks' => [
								'min' => 0
							]
						],
						'xAxes' => [
							'ticks' => [
								'min' => 0
							]
						]
					],
				],
				'data' =>[
					'labels' => $finalMonths,
					'datasets' =>
					[
						[
							'label' => 'Likes',
							'fill' => true,
							'backgroundColor' => [
								'rgba(255, 99, 132, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)',
								'rgba(153, 102, 255, 0.2)',
								'rgba(255, 159, 64, 0.2)'
							],
							
							'hoverBackgroundColor' => '#ffb3b3',
							'borderColor' => 'rgba(179,181,198,1)',
							'pointBackgroundColor' => 'rgba(179,181,198,1)',
							'pointBorderColor' => '#fff',
							'pointHoverBackgroundColor' => '#fff',
							'pointHoverBorderColor' => 'rgba(179,181,198,1)',
							'data' => $finalArrayLikes
						],
						
					],
				]
				
			]);
		?>
		</div>
	</div>
</div>

<div class='row'>
    <div class='col-md-12'>
		<div class='card-box'>
			<h2>Graph For Gym Reviewes Over Months</h2>
			<?= ChartJs::widget([
				'type' => 'bar',
				'options' => [
					'height' => 150,
					'width' => 400,
					'scales' => [
						'yAxes' => [
							'ticks' => [
								'min' => 0
							]
						],
						'xAxes' => [
							'ticks' => [
								
								'min' => 0
							]
						]
					],
				],
				'data' =>[
					'labels' => $finalMonths,
					'datasets' =>
					[
						[
							'label' => 'Score',
							'fill' => true,
							'backgroundColor' => [
								'rgba(255, 99, 132, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)',
								'rgba(153, 102, 255, 0.2)',
								'rgba(255, 159, 64, 0.2)'
							],
							'hoverBackgroundColor' => '#ffb3b3',
							'borderColor' => 'rgba(179,181,198,1)',
							'pointBackgroundColor' => 'rgba(179,181,198,1)',
							'pointBorderColor' => '#fff',
							'pointHoverBackgroundColor' => '#fff',
							'pointHoverBorderColor' => 'rgba(179,181,198,1)',
							'data' => $finalArrayReviews
						],
						
					],
				]
				
			]);
		?>
		</div>
	</div>
</div>
</div>

