<?php

use app\widgets\Button;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

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

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp;</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= Html::label('Unit Apartemen','nama') ?>
                        <?= Html::textInput('nama', '107 P Permata Hijau', ['id' => 'nama', 'disabled' => true, 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= Html::label('Nominal Token','harga') ?>
                        <div class="clearfix"></div>
                        <?= Html::buttonInput('IDR 100,000', ['value' => 64, 'class' => 'col-xs-5 btn1 btn-success']) ?>
                        <?= Html::buttonInput('IDR 200,000', ['value' => 128, 'class' => 'col-xs-5 btn1 btn-success']) ?>
                        <?= Html::buttonInput('IDR 300,000', ['value' => 192, 'class' => 'col-xs-5 btn1 btn-success']) ?>
                        <?= Html::buttonInput('IDR 500,000', ['value' => 320, 'class' => 'col-xs-5 btn1 btn-success']) ?>
                        <?= Html::buttonInput('IDR 1,000,000', ['value' => 640, 'class' => 'col-xs-5 btn1 btn-success']) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6" style="margin-top: 2%">
                    <div class="form-group">
                        <?= Html::label('Metode Pembayaran','payment') ?>
                        <?php //Html::radioList('payment', '', ['1' => 'Dana', '2' => 'GoPay', '3' => 'Ovo']) ?>
                        <div class="panel panel-primary">
                            <div class="panel-body"><input type="radio" name="metode" value="Dana"> <?= Html::label('Dana') ?><?= Html::label('100.000', 'dana', ['class' => 'pull-right']) ?></div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-body"><input type="radio" name="metode" value="Ovo Cash"> <?= Html::label('Ovo Cash') ?><?= Html::label('200.000', 'ovo', ['class' => 'pull-right']) ?></div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-body"><input type="radio" name="metode" value="Ovo Point"> <?= Html::label('Ovo Point') ?><?= Html::label('0', 'dana', ['class' => 'pull-right']) ?></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= Html::label('Total Pembayaran',null) ?><?= Html::label('IDR 105.000',null, ['class' => 'pull-right label label-warning', 'style' => 'font-size: medium']) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <a href="<?= Url::to(['smartmeter/index']) ?>" class="btn btn-block btn-primary">Beli</a>
                </div>
            </div>
        </div>
    </div>
</div>
