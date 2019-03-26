<?php

use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin(
    [
        'brandLabel' => 'Belleza Lifescape',
        'brandUrl' => Yii::$app->session->get('loggedIn') ? Url::to(['dashboard/index']) : Yii::$app->homeUrl,
        'options'   => [
            'class' => 'navbar navbar-default navbar-fixed-top'
        ]
    ]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        Yii::$app->session->get('loggedIn') ? ['label' => 'Logout', 'url' => array('/site/logout'), 'linkOptions' => ['data-method' => 'post']] : ['label' => 'Login', 'url'=>array('/site/login')],
    ],
]);

NavBar::end();
?>

<div class="wrap">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right"><?= 'Powered by Oriana Prima Persada' ?></p>
    </div>
</footer>

<script src='/js/vue.js'></script>
<script src='/js/vue-carousel-3d.min.js'></script>
<script src="/js/index.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

