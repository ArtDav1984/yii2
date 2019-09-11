<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property int $jobid
 * @property int $jobcategoryid
 * @property int $courseid from table "settings"
 * @property string $jobname
 * @property string $timefrom
 * @property string $timeto
 * @property string $period
 * @property string $contactperson
 * @property int $persons friends needed
 * @property int $persons_found persons already registered for this job
 * @property string $alert job-individual time before set urgent, overwrites "settings" alert time
 * @property string $notification_alert job-individual time before set notification, overwrites "settings" notification alert time
 * @property int $urgent
 * @property string $urgentmessage wird derzeit nicht benötigt, einzelne Nachrichten abzusetzen
 * @property int $repeat
 * @property string $location
 * @property int $active job active/inactive
 * @property int $completed
 *
 * @property Jobcategories $jobcategory
 * @property Settings $course
 * @property JobsUsers[] $jobsUsers
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jobcategoryid', 'courseid', 'jobname', 'timefrom', 'timeto', 'period', 'contactperson', 'persons', 'urgent', 'urgentmessage', 'repeat', 'location', 'active', 'completed'], 'required'],
            [['jobcategoryid', 'courseid', 'persons', 'persons_found', 'urgent', 'repeat', 'active', 'completed'], 'integer'],
            [['jobname', 'period', 'contactperson', 'urgentmessage', 'location'], 'string'],
            [['timefrom', 'timeto', 'alert', 'notification_alert'], 'safe'],
            [['jobcategoryid'], 'exist', 'skipOnError' => true, 'targetClass' => Jobcategories::className(), 'targetAttribute' => ['jobcategoryid' => 'categoryid']],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Settings::className(), 'targetAttribute' => ['courseid' => 'courseid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jobid' => 'Jobid',
            'jobcategoryid' => 'Jobcategoryid',
            'courseid' => 'Courseid',
            'jobname' => 'Jobname',
            'timefrom' => 'Timefrom',
            'timeto' => 'Timeto',
            'period' => 'Period',
            'contactperson' => 'Contactperson',
            'persons' => 'Persons',
            'persons_found' => 'Persons Found',
            'alert' => 'Alert',
            'notification_alert' => 'Notification Alert',
            'urgent' => 'Urgent',
            'urgentmessage' => 'Urgentmessage',
            'repeat' => 'Repeat',
            'location' => 'Location',
            'active' => 'Active',
            'completed' => 'Completed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobcategory()
    {
        return $this->hasOne(Jobcategories::className(), ['categoryid' => 'jobcategoryid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Settings::className(), ['courseid' => 'courseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobsUsers()
    {
        return $this->hasMany(JobsUsers::className(), ['jobid' => 'jobid']);
    }
}
