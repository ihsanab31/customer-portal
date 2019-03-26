<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mst_buildingfloor".
 *
 * @property int $floorid
 * @property string $nama
 * @property string $keterangan
 * @property int $siteid
 * @property int $towerid
 * @property int $isactive
 * @property string $entrydate
 * @property string $entryuserid
 * @property string $modifydate
 * @property string $modifyuserid
 *
 * @property Buildingtower $tower
 * @property AppUser $entryuser
 * @property AppUser $modifyuser
 * @property MasterSite $site
 * @property BuildingUnit[] $mstBuildingunits
 */
class BuildingFloor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return Yii::$app->session->get('schemaname').'.mst_buildingfloor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'siteid', 'towerid', 'entrydate', 'entryuserid'], 'required'],
            [['siteid', 'towerid', 'isactive'], 'default', 'value' => null],
            [['siteid', 'towerid', 'isactive'], 'integer'],
            [['entrydate', 'modifydate'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
            [['entryuserid', 'modifyuserid'], 'string', 'max' => 15],
            [['towerid'], 'exist', 'skipOnError' => true, 'targetClass' => BuildingTower::className(), 'targetAttribute' => ['towerid' => 'towerid']],
            [['entryuserid'], 'exist', 'skipOnError' => true, 'targetClass' => AppUser::className(), 'targetAttribute' => ['entryuserid' => 'userid']],
            [['modifyuserid'], 'exist', 'skipOnError' => true, 'targetClass' => AppUser::className(), 'targetAttribute' => ['modifyuserid' => 'userid']],
            [['siteid'], 'exist', 'skipOnError' => true, 'targetClass' => MasterSite::className(), 'targetAttribute' => ['siteid' => 'siteid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'floorid' => 'Floorid',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'siteid' => 'Siteid',
            'towerid' => 'Towerid',
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
    public function getTower()
    {
        return $this->hasOne(BuildingTower::className(), ['towerid' => 'towerid']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(MasterSite::className(), ['siteid' => 'siteid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuildingUnits()
    {
        return $this->hasMany(BuildingUnit::className(), ['floorid' => 'floorid']);
    }
}
