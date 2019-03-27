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

    .item{
        grid-area: myArea;
    }

    .grid-container{
        display: grid;
        grid-gap: 10px;
        grid-template-areas: 'myArea myArea';
        background-color: #E7E7E7;
        padding: 5px;
    }
</style>

<div class ="smart-meter-top-up">
    <div class="container">
        <div class = "col-md-6">
            <br/>
            <div class="row">
                <?php $form = ActiveForm::begin();

                    $topup->unitid = '107 P Permata Hijau';
                    echo $form->field($topup, 'unitid')->textInput(['disabled' => 'disabled'])->label('Unit Apartemen');
                ?>
            </div>
            <div class="row">
                    <label>Harga</label>
                    <br/>
                    <!-- Button Ongoing  -->
                    <?= Html::buttonInput('IDR 100,000', ['value' => 64, 'name' => 'a', 'class' => 'btn1 btn-success']) ?>

                    <?= Html::buttonInput('IDR 200,000', ['value' => 128, 'name' => 'a', 'class' => 'btn1 btn-success']) ?>

                    <?= Html::buttonInput('IDR 300,000', ['value' => 192, 'name' => 'a','class' => 'btn1 btn-success']) ?>
            </div>
            <div class="row">
                <?= Html::buttonInput('IDR 500,000', ['value' => 320, 'name' => 'b','class' => 'btn1 btn-success']) ?>

                <?= Html::buttonInput('IDR 1,000,000', ['value' => 640, 'name' => 'b', 'class' => 'btn1 btn-success']) ?>
            </div>
            <br/>
            <div class="row">
<!--                <label>Metode Pembayaran</label>-->
                    <!-- <table class="table-responsive table-bordered">
                    <tr height="10px">
                        <td style="font-weight: bold; text-align: center">Nama</td>
                        <td style="font-weight: bold; text-align: center">Saldo</td>
                    </tr>
                    <tr style="background-color: white">
                        <td width="200px">Dana</td>
                        <td>500,000</td>
                    </tr>
                    <tr>
                        <td>GoPay</td>
                        <td>30,000</td>
                    </tr>
                    <tr style="background-color: white">
                        <td>Ovo</td>
                        <td>0</td>
                    </tr>
                </table>-->
                <div class="grid-container">
                    <div class="item1" style="font-weight: bold; text-align: center">Metode Pembayaran</div>
                    <div class="item2" style="font-weight: bold; text-align: center"">Saldo</div>
                    <div class="item3"><input type="radio" name="radio" value="64"> Dana</div>
                    <div class="item4">500,000</div>
                    <div class="item5"><input type="radio" name="radio" value="64"> GoPay</div>
                    <div class="item6">30,000</div>
                    <div class="item7"><input type="radio" name="radio" value="64"> Ovo</div>
                    <div class="item8">0</div>
                </div>
            </div>
            <br/>
            <div class="row">
                <?= Button::create(null, 'smartmeter/index', 'btn btn-block btn-primary', 'fa fa-money', 'Top Up') ?>
            </div>
            <br/>
             <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

