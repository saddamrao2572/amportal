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
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        "font/iconsmind/style.css",
        "font/simple-line-icons/css/simple-line-icons.css",
        "css/vendor/bootstrap-stars.css",
        "css/vendor/bootstrap.min.css",
        "css/vendor/owl.carousel.min.css",
        "css/vendor/bootstrap-stars.css",
        "css/main.css",
        // "/css/dore.light.blue.min.css",

    ];
    public $js = [
        "js/vendor/jquery-3.3.1.min.js",
        "js/vendor/bootstrap.bundle.min.js",
        "js/vendor/owl.carousel.min.js",
        "js/vendor/landing-page/headroom.min.js",
        "js/vendor/landing-page/jQuery.headroom.js",
        "js/vendor/landing-page/jquery.scrollTo.min.js",
        "js/dore.scripts.landingpage.js",
        "js/scripts.js",
        "js/vendor/jquery.barrating.min.js",
        
        
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
