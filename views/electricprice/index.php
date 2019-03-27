<?php

use yii\bootstrap\Collapse;
use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\Button;
use yii\helpers\Url;
use app\widgets\AdvancedPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ElectricPrice */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Electric Price';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .panel-title a {
        display: block;
        padding: 10px 15px;
        margin: -10px -15px;
    }
</style>

<div class="building-floor-index">

    <div class="panel">
        <div class="panel-body">
            <?php
            echo Collapse::widget([
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => 'Filter Data <i class="fa fa-chevron-down pull-right"></i>',
                        'content' => $this->render('_search', ['model' => $searchModel]),
                        'contentOptions' => [],
                        'options' => ['class' => 'panel-info'],
                        'item' => ['<i class="fa fa-edit"></i>']
                    ]
                ]
            ]);
            ?>

            <div class="clearfix pull-right" style="padding-bottom: 10px!important;">
                <?= Button::create('add', 'create'); ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'price',
                    'kwh',
                    [
                        'attribute' => 'keterangan',
                        'enableSorting' => false,
                        'contentOptions' => ['style' => 'max-width: 300px; overflow: auto; word-wrap:break-word;']
                    ],
                    ['class' => 'app\widgets\ActionColumn',
                        'contentOptions' => ['style' => 'min-width:137px;width:137px'],
                        'header' => 'Action',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                $url = Url::to(['electricprice/delete', 'id' => $model->priceid]);
                                return Html::a('<span class="fa fa-trash"></span>', $url, [
                                    'title' => 'Delete',
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete ' . $model->price . ' ?'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-sm btn-circle btn-danger'
                                ]);
                            }
                        ]
                    ],
                ]
            ]); ?>

            <?= AdvancedPager::widget([
                'dataProvider' => $dataProvider,
            ]); ?>
        </div>
    </div>

</div>