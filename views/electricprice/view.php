<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Button;

/* @var $this yii\web\View */
/* @var $model app\models\BuildingFloor */

$this->title = $model->price;
$this->params['breadcrumbs'][] = ['label' => 'Building Floor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="electric-price-view">

    <div class="panel">
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'priceid',
                    'price',
                    'kwh',
                    'keterangan',
                    'isactive',
                    'entrydate',
                    'entryuserid',
                    'modifydate',
                    'modifyuserid',
                ],
            ]) ?>

            <div class="form-group pull-right">
                <?= Button::create('back', 'electricprice/index', 'btn btn-warning pull-right') ?>
            </div>
        </div>
    </div>
</div>
