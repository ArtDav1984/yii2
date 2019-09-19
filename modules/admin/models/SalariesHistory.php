<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "salaries_history".
 *
 * @property int $id
 * @property int $employees_id
 * @property string $created_at
 * @property int $salary
 *
 * @property Employees $employees
 */
class SalariesHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salaries_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employees_id', 'created_at', 'salary'], 'required'],
            [['employees_id', 'salary'], 'integer'],
            [['created_at'], 'safe'],
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
            'created_at' => 'Created At',
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
