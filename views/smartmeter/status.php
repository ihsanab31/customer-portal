<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\BuildingUnit;

$this->title = 'Status';

echo $this->registerJs(
    '$( document ).ready(function(){
        $("#unit-information").hide();
    });
        
    $("#unitid").change(function () {
            $("#unit-information").fadeOut();
            $("#tower").html("");
            $("#unit").html("");
            
            var unitid = $("#unitid").val();
            if(unitid !== ""){
                $.ajax({
                    url: "' . Yii::$app->request->hostInfo . '/smartmeter/ajax",
                    type: "post",
                    dataType : "json",
                    data: {
                        unitid: unitid,
                    },
                    success: function (data) {
                        console.log(data);
                        $("#tower").html(data.towername);
                        $("#unit").html(data.unitname);
                        $("#unit-information").fadeIn();
                    },
                    error: function(data){
                        console.log(data);
                        $("#tower").html("");
                        $("#unit").html("");
                        $("#unit-information").fadeOut();
                    }
                });
            }
        });
    ');

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading with-border">
                <h3 class="panel-title">Unit List</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?= Html::label('Unit', 'unitid') ?>
                    <?= Html::dropDownList('unitid', null, ArrayHelper::map(BuildingUnit::find()->asArray()->where(['unitid' => 1])->orWhere(['unitid' => 2])->all(), 'unitid', 'nama'), ['prompt' => 'Select Unit', 'class' => 'form-control', 'id' => 'unitid']); ?>
                </div>
            </div>
        </div>
        <div class="panel panel-primary" id="unit-information">
            <div class="panel-heading with-border">
                <h3 class="panel-title">Unit Information</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-building"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 8%">Tower</span>
                                <span class="info-box-number" id="tower"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-home"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 8%">Unit</span>
                                <span class="info-box-number" id="unit"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
