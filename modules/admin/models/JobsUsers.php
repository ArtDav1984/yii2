<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "jobs_users".
 *
 * @property int $id
 * @property int $userid
 * @property int $jobid
 * @property string $deviceid
 *
 * @property Users $user
 * @property Jobs $job
 */
class JobsUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'jobid', 'deviceid'], 'required'],
            [['userid', 'jobid'], 'integer'],
            [['deviceid'], 'string', 'max' => 50],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userid' => 'userid']],
            [['jobid'], 'exist', 'skipOnError' => true, 'targetClass' => Jobs::className(), 'targetAttribute' => ['jobid' => 'jobid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'jobid' => 'Jobid',
            'deviceid' => 'Deviceid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Jobs::className(), ['jobid' => 'jobid']);
    }
}
