<?php

use yii\helpers\Url;

$this->title = 'Status';

?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Unit Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <p class="text-center"><i class="fa fa-home fa-5x"></i></p>
                <h3 class="profile-username text-center text-bold" style="font-family: 'Agency FB';">107 P Permata hijau</h3>
                <p class="text-muted text-center">Cassa de Belleza Tower</p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Arus</b>
                        <p class="pull-right">200 A</p>
                    </li>
                    <li class="list-group-item">
                        <b>Tegangan</b>
                        <p class="pull-right">22 V</p>
                    </li>
                    <li class="list-group-item">
                        <b>Balance</b> <label class="label label-primary pull-right">144 kWh</label>
                    </li>
                </ul>
                <a href="<?= Url::to(['smartmeter/topup']) ?>" class="btn btn-block btn-primary">
                    <i class="fa fa-money"></i> Top Up
                </a>
            </div>
        </div>
    </div>
</div>
