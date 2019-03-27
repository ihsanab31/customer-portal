<?php

use app\widgets\Button;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ElectricPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electric-price-form col-md-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'kwh')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Button::create('back', 'electricprice/index'); ?>
        <?= Button::submit($mode == 'create' ? 'save' : 'edit', 'btn btn-success'); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
