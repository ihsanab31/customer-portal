<?php

namespace app\models;

/**
 * This is the model class for table "app_userschema".
 *
 * @property string $userid
 * @property string $schemaname
 * @property int $isdefault
 *
 * @property AppUser $user
 */
class AppUserschema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_userschema';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'schemaname', 'isdefault'], 'required'],
            [['isdefault'], 'default', 'value' => null],
            [['isdefault'], 'integer'],
            [['userid', 'schemaname'], 'string', 'max' => 15],
            [['userid'], 'unique'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => AppUser::className(), 'targetAttribute' => ['userid' => 'userid']],
            [['schemaname'], 'exist', 'skipOnError' => true, 'targetClass' => MstSite::className(), 'targetAttribute' => ['schemaname' => 'schemaname']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'schemaname' => 'Schemaname',
            'isdefault' => 'Isdefault',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AppUser::className(), ['userid' => 'userid']);
    }

}