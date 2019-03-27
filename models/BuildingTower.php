<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mst_buildingtower".
 *
 * @property int $towerid
 * @property string $nama
 * @property string $keterangan
 * @property int $siteid
 * @property int $isactive
 * @property string $entrydate
 * @property string $entryuserid
 * @property string $modifydate
 * @property string $modifyuserid
 *
 * @property BuildingFloor[] $mstBuildingfloors
 * @property AppUser $entryuser
 * @property AppUser $modifyuser
 * @property MasterSite $site
 * @property BuildingUnit[] $mstBuildingunits
 */
class BuildingTower extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return Yii::$app->session->get('loggedIn') ?
            Yii::$app->session->get('schemaname') . '.mst_buildingtower' :
            Yii::$app->params['schema'] . '.mst_buildingtower';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'siteid', 'entrydate', 'entryuserid'], 'required'],
            [['siteid', 'isactive'], 'default', 'value' => null],
            [['siteid', 'isactive'], 'integer'],
            [['entrydate', 'modifydate'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
            [['entryuserid', 'modifyuserid'], 'string', 'max' => 15],
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
            'towerid' => 'Towerid',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'siteid' => 'Siteid',
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
    public function getBuildingFloors()
    {
        return $this->hasMany(BuildingFloor::className(), ['towerid' => 'towerid']);
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
        return $this->hasMany(BuildingUnit::className(), ['towerid' => 'towerid']);
    }
}
