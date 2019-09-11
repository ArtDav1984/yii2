<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $userid
 * @property int $appid
 * @property int $courseid
 * @property string $name
 * @property string $surname
 * @property string $nickname often more important than realname
 * @property string $pass admin password
 * @property int $active 1,2,3: active, deactivated or locked (no logon via DWBN SSO or via used device)
 * @property int $numberid table locked_numbers to block phones
 *
 * @property JobsUsers[] $jobsUsers
 */
class Users extends \yii\db\ActiveRecord
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
            [['appid', 'courseid', 'name', 'surname', 'nickname', 'pass', 'active', 'numberid'], 'required'],
            [['appid', 'courseid', 'active', 'numberid'], 'integer'],
            [['name', 'surname', 'nickname', 'pass'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'appid' => 'Appid',
            'courseid' => 'Courseid',
            'name' => 'Name',
            'surname' => 'Surname',
            'nickname' => 'Nickname',
            'pass' => 'Pass',
            'active' => 'Active',
            'numberid' => 'Numberid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobsUsers()
    {
        return $this->hasMany(JobsUsers::className(), ['userid' => 'userid']);
    }
}
