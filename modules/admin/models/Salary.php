<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "salary".
 *
 * @property int $id
 * @property int $employees_id
 * @property string $create_at
 * @property int $salary
 *
 * @property Employees $employees
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employees_id', 'create_at', 'salary'], 'required'],
            [['employees_id', 'salary'], 'integer'],
            [['create_at'], 'safe'],
            [['employees_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employees_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employees_id' => 'Employees ID',
            'create_at' => 'Create At',
            'salary' => 'Salary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employees_id']);
    }
}
