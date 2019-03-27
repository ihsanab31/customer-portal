<?php

use app\widgets\Button;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ElectricPriceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electric-price-search">


    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'price') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'kwh') ?>
        </div>
    </div>

    <div class="form-group pull-right">
        <?= Button::create('reset'); ?>
        <?= Button::submit(null, 'btn btn-primary', null, 'Search') ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
