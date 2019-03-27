<?php
namespace app\assets;

use yii\web\AssetBundle;

class HighchartsAsset extends AssetBundle
{
    public $sourcePath = '@bower/highcharts';
    public $css = [];
    public $js = [
        'highcharts.js',
        'highcharts-more.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
?>