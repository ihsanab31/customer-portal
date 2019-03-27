<?php

namespace app\models;

use app\models\BuildingUnit;
use Yii;

class Topup extends \yii\db\ActiveRecord {

    public static function tableName()
    {
        return Yii::$app->session->get('schemaname').'.history_topup';
    }

    public function rules()
    {
        return[
            [['topupid', 'nominal', 'nominalkwh', 'unitid'], 'required'],
            [['topupid', 'nominal', 'nominalkwh', 'unitid'], 'integer'],
            ['entrydate', 'date'],
            ['entryuserid', 'string', 'max' => 15]
        ];
    }

    public function attributeLabels()
    {
        return [
            'topupid' => 'Top Up ID',
            'nominal' => 'Nominal',
            'nominalkwh' => 'Jumlah kWh',
            'unitid' => 'Unit ID',
        ];
    }

    // get table relations with mst_buildingunit
    public function getBuildingUnit(){
        return $this->hasMany(BuildingUnit::classname(), ['unitid' => 'unitid']);
    }

    // get payment method

    // get user_payment
}