<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
        <style>
            .bg-image {
                background-image: url(<?php echo Yii::$app->request->hostInfo.'/img/slide-2.jpg'?>);
                filter: blur(3px);
                -webkit-filter: blur(3px);
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            body{
                font-family: 'Amaranth', serif;
            }
        </style>
    </head>

    <body>
    <?php $this->beginBody() ?>
    <div class="bg-image"></div>
    <div class="container">
        <?=$content?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>