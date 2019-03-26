<?php

namespace app\models;

/**
 * This is the model class for table "app_user".
 *
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $jenis
 * @property int $refid
 * @property string $userid
 * @property string $status
 *
 * @property AppUserrole $appUserrole
 * @property AppUserschema $appUserschema
 */
class AppUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama', 'jenis', 'userid', 'status'], 'required'],
            [['refid'], 'default', 'value' => null],
            [['refid'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['nama'], 'string', 'max' => 100],
            [['jenis'], 'string', 'max' => 5],
            [['userid'], 'string', 'max' => 15],
            [['status'], 'string', 'max' => 10],
            [['userid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'jenis' => 'Jenis',
            'refid' => 'Refid',
            'userid' => 'Userid',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppUserrole()
    {
        return $this->hasOne(AppUserrole::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppUserschema()
    {
        return $this->hasOne(AppUserschema::className(), ['userid' => 'userid']);
    }

}