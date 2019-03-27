<?php

use yii\helpers\Url;

$this->title = 'Laporan BM';

?>

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
                <a href="<?= Url::to(['smartmeter/reportdetails', 'bulan' => 'Maret', 'tahun' => 2019]) ?>" class="btn btn-default btn-block" style="text-align: left; margin-top: 1%">
                    Laporan Maret 2019<i class="fa fa-download pull-right"></i>
                </a>
                <a href="<?= Url::to(['smartmeter/reportdetails', 'bulan' => 'Februari', 'tahun' => 2019]) ?>" class="btn btn-default btn-block" style="text-align: left; margin-top: 1%">
                    Laporan Februari 2019<i class="fa fa-download pull-right"></i>
                </a>
                <a href="<?= Url::to(['smartmeter/reportdetails', 'bulan' => 'Januari', 'tahun' => 2019]) ?>" class="btn btn-default btn-block" style="text-align: left; margin-top: 1%">
                    Laporan Januari 2019<i class="fa fa-download pull-right"></i>
                </a>
                <a href="<?= Url::to(['smartmeter/reportdetails', 'bulan' => 'Desember', 'tahun' => 2018]) ?>" class="btn btn-default btn-block" style="text-align: left; margin-top: 1%">
                    Laporan Desember 2018<i class="fa fa-download pull-right"></i>
                </a>
                <a href="<?= Url::to(['smartmeter/reportdetails', 'bulan' => 'November', 'tahun' => 2018]) ?>" class="btn btn-default btn-block" style="text-align: left; margin-top: 1%">
                    Laporan November 2018<i class="fa fa-download pull-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
