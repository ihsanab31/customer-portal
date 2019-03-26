<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mst_buildingunit".
 *
 * @property int $unitid
 * @property string $nama
 * @property string $keterangan
 * @property double $size_net
 * @property double $size_semigross
 * @property string $unittype
 * @property int $siteid
 * @property int $towerid
 * @property int $floorid
 * @property int $isactive
 * @property string $entrydate
 * @property string $entryuserid
 * @property string $modifydate
 * @property string $modifyuserid
 *
 * @property BuildingFloor $floor
 * @property BuildingTower $tower
 * @property AppUser $entryuser
 * @property AppUser $modifyuser
 * @property MasterSite $site
 * @property Electricity[] $mstElectricities
 */
class BuildingUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return Yii::$app->session->get('schemaname').'.mst_buildingunit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'unittype', 'siteid', 'towerid', 'floorid', 'entrydate', 'entryuserid'], 'required'],
            [['size_net', 'size_semigross'], 'number'],
            [['unittype'], 'string'],
            [['siteid', 'towerid', 'floorid', 'isactive'], 'default', 'value' => null],
            [['siteid', 'towerid', 'floorid', 'isactive'], 'integer'],
            [['entrydate', 'modifydate'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
            [['entryuserid', 'modifyuserid'], 'string', 'max' => 15],
            [['floorid'], 'exist', 'skipOnError' => true, 'targetClass' => BuildingFloor::className(), 'targetAttribute' => ['floorid' => 'floorid']],
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
            'unitid' => 'Unitid',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'size_net' => 'Size Net',
            'size_semigross' => 'Size Semigross',
            'unittype' => 'Unittype',
            'siteid' => 'Siteid',
            'towerid' => 'Towerid',
            'floorid' => 'Floorid',
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
    public function getFloor()
    {
        return $this->hasOne(BuildingFloor::className(), ['floorid' => 'floorid']);
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
    public function getElectricity()
    {
        return $this->hasOne(Electricity::className(), ['unitid' => 'unitid']);
    }
}
