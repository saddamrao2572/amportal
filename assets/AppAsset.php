<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        "font/iconsmind/style.css",
        "font/simple-line-icons/css/simple-line-icons.css",
        "css/vendor/bootstrap-float-label.min.css",
        "css/vendor/bootstrap.min.css",
        "css/vendor/perfect-scrollbar.css",
        "css/vendor/jquery.contextMenu.min.css",
        "css/main.css",
        "css/dore.light.blue.min.css",
        "css/vendor/component-custom-switch.min.css",
        "css/vendor/fullcalendar.min.css",

    ];
    public $js = [
		//"js/jquery-1.9.0.min.js",
		//"js/vendor/jquery-3.3.1.min.js",
		  //"js/vendor/jquery-3.3.1.min.js",
    "js/vendor/bootstrap.bundle.min.js",
    "js/vendor/Chart.bundle.min.js",
    "js/vendor/chartjs-plugin-datalabels.js",
    "js/vendor/moment.min.js",
    "js/vendor/fullcalendar.min.js",
    "js/vendor/datatables.min.js",
    "js/vendor/perfect-scrollbar.min.js",
    "js/vendor/owl.carousel.min.js",
    "js/vendor/progressbar.min.js",
    "js/vendor/jquery.barrating.min.js",
    "js/vendor/select2.full.js",
    "js/vendor/nouislider.min.js",
    "js/vendor/bootstrap-datepicker.js",
    "js/vendor/Sortable.js",
    "js/vendor/mousetrap.min.js",
    "js/dore.script.js",
    "js/scripts.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap4\BootstrapAsset',
    ];
}
