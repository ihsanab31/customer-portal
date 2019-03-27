<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElectricPrice */

$this->title = 'Update Electric Price: ' . $model->priceid;
$this->params['breadcrumbs'][] = ['label' => 'Electric Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->priceid, 'url' => ['view', 'id' => $model->priceid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="electric-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mode' => 'update',
    ]) ?>

</div>
