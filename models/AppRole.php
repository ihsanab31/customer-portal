<?php

namespace app\models;

/**
 * This is the model class for table "app_role".
 *
 * @property string $roleid
 * @property string $nama
 * @property int $tierlevel
 * @property int $isbuiltin
 *
 * @property AppUserrole[] $appUserroles
 */
class AppRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roleid', 'nama', 'tierlevel', 'isbuiltin'], 'required'],
            [['tierlevel', 'isbuiltin'], 'default', 'value' => null],
            [['tierlevel', 'isbuiltin'], 'integer'],
            [['roleid'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 100],
            [['roleid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'roleid' => 'Roleid',
            'nama' => 'Nama',
            'tierlevel' => 'Tierlevel',
            'isbuiltin' => 'Isbuiltin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppUserroles()
    {
        return $this->hasMany(AppUserrole::className(), ['roleid' => 'roleid']);
    }
}
