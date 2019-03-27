<?php

use app\widgets\Button;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Top Up Smart Meter';
?>
<style>
    .btn1 {
        background-color: #B9B9B9; /* Green */
        border: none;
        color: black;
        padding: 10px 18px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .btn1 .btn-success:active {
        background-color: #21BC12;
        color: white;
    }
</style>

<div class ="smart-meter-top-up">
    <div class="row">
        <div class = "col-md-6">
            <?php $form = ActiveForm::begin();

            $topup->unitid = '107 P Permata Hijau';
            echo $form->field($topup, 'unitid')->textInput(['disabled' => 'disabled'])->label('Unit Apartemen');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Harga</label>
            <br/>
            <?= Html::buttonInput('IDR 100,000', ['value' => 64, 'class' => 'btn1 btn-success']) ?>

            <?= Html::buttonInput('IDR 200,000', ['value' => 128, 'class' => 'btn1 btn-success']) ?>

            <?= Html::buttonInput('IDR 300,000', ['value' => 192, 'class' => 'btn1 btn-success']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= Html::buttonInput('IDR 500,000', ['value' => 320, 'class' => 'btn1 btn-success']) ?>

            <?= Html::buttonInput('IDR 1,000,000', ['value' => 640, 'class' => 'btn1 btn-success']) ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-4">
            <label>Metode Pembayaran</label>
            <?php
            $payment= ['1' => 'Dana', '2' => 'GoPay', '3' => 'Ovo']; //Temporary
            echo Html::radioList('payment','' , $payment);
            ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group pull-right">
            <?= Button::create(null, 'smartmeter/index', 'btn btn-primary', '', 'Top Up') ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


