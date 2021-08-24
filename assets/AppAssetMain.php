<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetMain extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
		'http://fonts.googleapis.com/css?family=Nunito:300,400,700',
		'gym/libraries/font-awesome/css/font-awesome.min.css',
		'gym/libraries/owl.carousel/assets/owl.carousel.css',
		'gym/libraries/colorbox/example1/colorbox.css',
		'gym/libraries/bootstrap-select/bootstrap-select.min.css',
		'gym/css/superlist.css',
		'gym/css/site.css',
		'gym/gym/css/flaticon.css',
    ];
    public $js = [
		//'js/map.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/transition.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/tab.js',
		'gym/libraries/bootstrap-sass/javascripts/bootstrap/alert.js',
		'gym/libraries/colorbox/jquery.colorbox-min.js',
		'gym/libraries/flot/jquery.flot.min.js',
		'gym/libraries/flot/jquery.flot.spline.js',
		'gym/libraries/bootstrap-select/bootstrap-select.min.js',
		'http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&key=AIzaSyACXWJt6uQU4a1eMviVMw2q9YJW4bd5f3c',
		'gym/libraries/jquery-google-map/infobox.js',
		'gym/libraries/jquery-google-map/markerclusterer.js',
		'gym/libraries/jquery-google-map/jquery-google-map.js',
		'gym/libraries/owl.carousel/owl.carousel.js',
		'gym/libraries/bootstrap-fileinput/fileinput.min.js',
		'gym/libraries/loadingoverlay.min.js',
		'gym/libraries/loadingoverlay_progress.min.js',
		'gym/js/jquery.equalheights.min.js',
		'gym/js/superlist.js',
		'gym/js/jquery.highlight.js',
		'gym/js/sizzle-selenium.js',
		'gym/js/specify.js',
		'gym/js/Chart.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        
    ];
}
