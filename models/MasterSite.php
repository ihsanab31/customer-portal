<?php

namespace app\models;

/**
 * This is the model class for table "mst_site".
 *
 * @property int $siteid
 * @property string $schemaname
 * @property string $nama
 * @property string $keterangan
 * @property int $isactive
 * @property string $entrydate
 * @property string $entryuserid
 * @property string $modifydate
 * @property string $modifyuserid
 *
 * @property AppUserschema[] $appUserschemas
 * @property AppUser $entryuser
 * @property AppUser $modifyuser
 */
class MasterSite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_site';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schemaname', 'nama', 'entrydate', 'entryuserid'], 'required'],
            [['isactive'], 'default', 'value' => null],
            [['isactive'], 'integer'],
            [['entrydate', 'modifydate'], 'safe'],
            [['schemaname', 'entryuserid', 'modifyuserid'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
            [['schemaname'], 'unique'],
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
            'siteid' => 'Siteid',
            'schemaname' => 'Schemaname',
            'nama' => 'Nama',
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
    public function getAppUserschemas()
    {
        return $this->hasMany(AppUserschema::className(), ['schemaname' => 'schemaname']);
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
