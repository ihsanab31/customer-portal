<?php

namespace app\models;

/**
 * This is the model class for table "app_userrole".
 *
 * @property string $userid
 * @property string $roleid
 *
 * @property AppRole $role
 * @property AppUser $user
 */
class AppUserRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_userrole';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'roleid'], 'required'],
            [['userid', 'roleid'], 'string', 'max' => 15],
            [['userid'], 'unique'],
            [['roleid'], 'exist', 'skipOnError' => true, 'targetClass' => AppRole::className(), 'targetAttribute' => ['roleid' => 'roleid']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => AppUser::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'roleid' => 'Roleid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(AppRole::className(), ['roleid' => 'roleid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AppUser::className(), ['userid' => 'userid']);
    }
}
