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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "font/iconsmind/style.css",
        "font/simple-line-icons/css/simple-line-icons.css",
        "css/vendor/bootstrap.min.css",
        "css/vendor/bootstrap-float-label.min.css",
        "css/main.css",
    ];
    public $js = [
        // "js/vendor/jquery-3.3.1.min.js",
        "js/vendor/bootstrap.bundle.min.js",
        "js/dore.script.js",
        "js/scripts.js",
        
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
