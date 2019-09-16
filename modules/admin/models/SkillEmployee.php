<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "skills_employees".
 *
 * @property int $id
 * @property int $skills_id
 * @property int $employees_id
 *
 * @property Employees $employees
 * @property Skills $skills
 */
class SkillEmployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skills_employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['skills_id', 'employees_id'], 'required'],
            [['skills_id', 'employees_id'], 'integer'],
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
            'skills_id' => 'Skills ID',
            'employees_id' => 'Employees ID',
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
