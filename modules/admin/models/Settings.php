<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $courseid
 * @property string $coursename
 * @property string $startdate time range for job datetime pickers
 * @property string $enddate
 * @property int $status composition, active, backup, archived - only active course is seen in the frontend
 * @property string $alert standard alert time before job gets really urgent
 * @property string $notification_alert standard notification alert time before job gets really urgent
 * @property string $admin
 * @property string $pass
 * @property string $messages Standartmessage x min bevor job starts (notifaction alert dependend)
 * @property int $active
 *
 * @property Jobs[] $jobs
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coursename', 'startdate', 'enddate', 'alert', 'notification_alert', 'admin', 'pass', 'messages', 'active'], 'required'],
            [['coursename', 'admin', 'pass', 'messages'], 'string'],
            [['startdate', 'enddate', 'alert', 'notification_alert'], 'safe'],
            [['status', 'active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'courseid' => 'Courseid',
            'coursename' => 'Coursename',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'status' => 'Status',
            'alert' => 'Alert',
            'notification_alert' => 'Notification Alert',
            'admin' => 'Admin',
            'pass' => 'Pass',
            'messages' => 'Messages',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Jobs::className(), ['courseid' => 'courseid']);
    }
}
