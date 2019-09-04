<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $description
 * @property string $token
 * @property string $auth_key
 * @property string $createAt
 * @property int $isDeleted
 *
 * @property Activity[] $activities
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password_hash'], 'required'],
            [['description'], 'string'],
            [['createAt'], 'safe'],
            [['isDeleted'], 'integer'],
            [['email', 'password_hash', 'token', 'auth_key'], 'string', 'max' => 150],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'description' => Yii::t('app', 'Description'),
            'token' => Yii::t('app', 'Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'createAt' => Yii::t('app', 'Create At'),
            'isDeleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::class, ['user_id' => 'id']);
    }
}
