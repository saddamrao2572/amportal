<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
?>
<div class="page-title">
	<h1>Edit Profile</h1>
</div><!-- /.page-title -->
<?php Pjax::begin(['id'=>'contact']) ?>
	<?php
			$form = ActiveForm::begin([
				'id' => 'contact_information_form',
				'enableClientValidation' => true,
				'options' =>['data-pjax'=>'']
			]);
	?>
		<div class="background-white p20 mb30">
			<h3 class="page-title">
				Contact Information
				<button type="submit" class="btn btn-primary btn-xs pull-right">Save</a>
			</h3>
			<div class="row">
				<div class='col-md-6'>
					<?= $form->field($model, 'email')->textInput(['readonly'=>!empty($model->email)]) ?>
				</div>
				<div class='col-md-6'>
					<?= $form->field($model, 'username')->textInput(['readonly'=>!empty($model->username)]) ?>
				</div>
			</div>
			<div class="row">
				<div class='col-md-6'>
					<?= $form->field($model->userDetails, 'name')->textInput() ?>
				</div>
				<div class='col-md-6'>
					<?= $form->field($model->userDetails, 'mobile')->textInput() ?>
				</div>
			</div>
		</div>
	<?php ActiveForm::end(); ?> 
<?php Pjax::end(); ?>

<?php Pjax::begin(['id'=>'address']) ?>
	<?php
			$form = ActiveForm::begin([
				'id' => 'address_information_form',
				'enableClientValidation' => true,
				'options' =>['data-pjax'=>'']
			]);
	?>
		<div class="background-white p30 mb30">
			<h3 class="page-title">Address Information
				<button type="submit" class="btn btn-primary btn-xs pull-right">Save</a>
			</h3>

			<?= $form->field($model->userDetails, 'address')->textInput([
					'maxlength' => true, 
					'class' => 'controls form-control mb30'
				]) 
			?>
			<div id="map-canvas"></div>
			<div class="row">
				<div class="col-sm-6">
					<?= $form->field($model->userDetails, 'state_id')
							->dropDownList(
								ArrayHelper::map(\app\models\State::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
								['prompt'=>'Select State']    // options
							);
					 ?>
				</div>
				<div class="col-sm-6">
					<input type='hidden' value="<?= $model->isNewRecord ? "" : isset($model->userDetails->city) ? $model->userDetails->city->name : "" ?>" id="hidden-city-name" value="" />
					<?= $form->field($model->userDetails, 'city_id')->widget(DepDrop::classname(), [
						'options' => ['class' => 'form-control'],
						'pluginOptions' => [
							'depends' => [Html::getInputId($model->userDetails, 'state_id')],
							'placeholder' => 'Select City ...',
							'url' => Url::to(['/state/city']),
							//'initialize' => true,
							'params'=>['hidden-city-name']
						]
					]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?= $form->field($model->userDetails, 'street',['template' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-building-o"></i></span>{input}</div>'])->textInput([
						'maxlength' => true,
						'placeholder' =>'Street Address',
						//'readonly'=>'readonly'
					]) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($model->userDetails, 'suburb',['template' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-map-o"></i></span>{input}</div>'
					])->textInput([
						'maxlength' => true,
						'placeholder' =>'Suburb',
						//'readonly'=>'readonly'
					]) ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<?= $form->field($model->userDetails, 'lat',['template' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>{input}</div>'])->textInput([
						'maxlength' => true,
						'placeholder' =>'Latitude',
						//'readonly'=>'readonly'
					]) ?>
				</div>
				<div class="col-sm-4">
					<?= $form->field($model->userDetails, 'lng',['template' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>{input}</div>'
					])->textInput([
						'maxlength' => true,
						'placeholder' =>'Longitude',
						//'readonly'=>'readonly'
					]) ?>
				</div>
				<div class="col-sm-4">
					<?= $form->field($model->userDetails, 'zip',['template' => '<div class="input-group"><span class="input-group-addon"><i class="">p</i></span>{input}</div>'
					])->textInput([
						'maxlength' => true,
						'placeholder' =>'Zip',
						//'readonly'=>'readonly'
					]) ?>
				</div>
			</div>
		</div><!-- /.box -->
	<?php ActiveForm::end(); ?> 

<?php
$flag =  20;
$input = Html::getInputId($model->userDetails, 'address');
$stateInputID = Html::getInputId($model->userDetails, 'state_id');
$cityInputID = 'hidden-city-name';
$streetInputID = Html::getInputId($model->userDetails, 'street');
$suburbInputID = Html::getInputId($model->userDetails, 'suburb');
$latInputID = Html::getInputId($model->userDetails, 'lat');
$lngInputID = Html::getInputId($model->userDetails, 'lng');
$zipInputID = Html::getInputId($model->userDetails, 'zip');
$citySelect = Html::getInputId($model->userDetails, 'city_id');
$lat = !empty($model->userDetails->lat) ? $model->userDetails->lat : -33.8688;
$lng = !empty($model->userDetails->lng) ? $model->userDetails->lng : 151.2195;
$js = <<< JS
    var inputid = '$input';
	var stateInputID = '$stateInputID';
	var cityInputID = '$cityInputID';
	var streetInputID = '$streetInputID';
	var suburbInputID = '$suburbInputID';
	var latInputID = '$latInputID';
	var lngInputID = '$lngInputID';
	var zipInputID = '$zipInputID';
	var citySelect = '$citySelect';
	$(document).on('ready',function(){
		//alert($flag);
		if($flag == 20) {
			setTimeout(function(){
				$('#' + stateInputID).change();
			},2000);
		}
		
		$('#' + citySelect).on('depdrop.afterChange', function(event, id, value) {
			$('#' + cityInputID).val('');
		});
	});
	
	function initialize() {
        var myLatlng = new google.maps.LatLng('$lat', '$lng');
		var mapOptions = {
            center: new google.maps.LatLng('$lat', '$lng'),
            zoom: 13
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

        var input = /** @type {HTMLInputElement} */(document.getElementById('$input'));

		var types = document.getElementById('type-selector');
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			draggable: true,
			map: map,
			anchorPoint: new google.maps.Point('$lat', '$lng'),
			position: myLatlng
		});

		google.maps.event.addListener(marker, "mouseup", function(event) {
			$('#' + latInputID).val(this.position.lat());
			$('#' + lngInputID).val(this.position.lng());
		});

		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			$('#' + cityInputID).val('');
			
			infowindow.close();
			marker.setVisible(true);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}
			marker.setIcon(/** @type {google.maps.Icon} */({
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 35)
			}));
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			$('#' + latInputID).val(place.geometry.location.lat());
			$('#' + lngInputID).val(place.geometry.location.lng());

			var address = '';
			var street = '';
			var suburb = '';
			var city = '';
			var state = '';
			var zip = '';
			console.log(place.address_components);
			if (place.address_components) {
				for (var i = 0; i < place.address_components.length; i++) {
					var addressType = place.address_components[i].types[0];
					if(addressType == 'subpremise') {
						street += place.address_components[i].short_name;
					}
					if(addressType == 'street_number') {
						street += ' ' + place.address_components[i].short_name;
					}
					if(addressType == 'route') {
						street += ' ' + place.address_components[i].short_name;
					}
					if(addressType == 'locality') {
						suburb = place.address_components[i].short_name;
					}
					if(addressType == 'administrative_area_level_2') {
						city = place.address_components[i].short_name;
					}
					if(addressType == 'administrative_area_level_1') {
						state = place.address_components[i].long_name;
					}
					if(addressType == 'postal_code') {
						zip = place.address_components[i].short_name;
					}	
				}
				$('#' + streetInputID).val(street);
				$('#' + suburbInputID).val(suburb);
				$('#' + zipInputID).val(zip);
				$('#' + cityInputID).val(city);
				var val = $('#' + stateInputID + ' option').filter(function () { 
					return $(this).text() ==  state; 
				}).val();
				
				$('#' + stateInputID).val(val);
				$('#' + stateInputID).change();
				address = [
				(place.address_components[0] && place.address_components[0].short_name || ''),
				(place.address_components[1] && place.address_components[1].short_name || ''),
				(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
			}

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);
		});
	}

	if ($('#map-canvas').length != 0) {
		google.maps.event.addDomListener(window, 'load', initialize);
	}
JS;
$this->registerJs($js);
?>
<?php Pjax::end(); ?>	
			