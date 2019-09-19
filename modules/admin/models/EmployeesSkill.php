<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "employees_skills".
 *
 * @property int $id
 * @property int $employees_id
 * @property int $skills_id
 *
 * @property Employees $employees
 * @property Skills $skills
 */
class EmployeesSkill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees_skills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employees_id', 'skills_id'], 'required'],
            [['employees_id', 'skills_id'], 'integer'],
            [['employees_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employees_id' => 'id']],
            [['skills_id'], 'exist', 'skipOnError' => true, 'targetClass' => Skill::className(), 'targetAttribute' => ['skills_id' => 'id']],
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
            'skills_id' => 'Skills',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employees_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasOne(Skill::className(), ['id' => 'skills_id']);
    }
}
