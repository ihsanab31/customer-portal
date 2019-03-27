<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mst_electric_price".
 *
 * @property int $priceid
 * @property int $price
 * @property int $kwh
 * @property string $keterangan
 * @property int $isactive
 * @property string $entrydate
 * @property string $entryuserid
 * @property string $modifydate
 * @property string $modifyuserid
 *
 * @property AppUser $entryuser
 * @property AppUser $modifyuser
 */
class ElectricPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'entrydate',
                'updatedAtAttribute' => 'modifydate',
                'value' => date('Y-m-d H:i:s')
            ],
        ];
    }
    public static function tableName()
    {
        return Yii::$app->session->get('schemaname').'.mst_electric_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'kwh', 'entryuserid'], 'required'],
            [['isactive'], 'default', 'value' => 1],
            [['price', 'kwh', 'isactive'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
            [['entryuserid', 'modifyuserid'], 'string', 'max' => 15],
            [['entryuserid'], 'exist', 'skipOnError' => true, 'targetClass' => AppUser::className(), 'targetAttribute' => ['entryuserid' => 'userid']],
            [['modifyuserid'], 'exist', 'skipOnError' => true, 'targetClass' => AppUser::className(), 'targetAttribute' => ['modifyuserid' => 'userid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'priceid' => 'Priceid',
            'price' => 'Price',
            'kwh' => 'Kwh',
            'keterangan' => 'Keterangan',
            'isactive' => 'Isactive',
            'entrydate' => 'Entrydate',
            'entryuserid' => 'Entryuserid',
            'modifydate' => 'Modifydate',
            'modifyuserid' => 'Modifyuserid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntryuser()
    {
        return $this->hasOne(AppUser::className(), ['userid' => 'entryuserid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifyuser()
    {
        return $this->hasOne(AppUser::className(), ['userid' => 'modifyuserid']);
    }
}
