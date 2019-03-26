<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mst_electricity".
 *
 * @property int $electricityid
 * @property int $saldo
 * @property int $unitid
 * @property string $modifydate
 *
 * @property BuildingUnit $unit
 */
class Electricity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_electricity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['saldo', 'unitid'], 'required'],
            [['saldo', 'unitid'], 'default', 'value' => null],
            [['saldo', 'unitid'], 'integer'],
            [['modifydate'], 'safe'],
            [['unitid'], 'exist', 'skipOnError' => true, 'targetClass' => BuildingUnit::className(), 'targetAttribute' => ['unitid' => 'unitid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'electricityid' => 'Electricityid',
            'saldo' => 'Saldo',
            'unitid' => 'Unitid',
            'modifydate' => 'Modifydate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(BuildingUnit::className(), ['unitid' => 'unitid']);
    }
}
