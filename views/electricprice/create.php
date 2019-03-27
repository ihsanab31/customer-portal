<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElectricPrice */

$this->title = 'Create Electric Price';
$this->params['breadcrumbs'][] = ['label' => 'Electric Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electric-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mode' => 'create',
    ]) ?>

</div>
