<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property int $id
 * @property string $name
 *
 * @property SkillsEmployees[] $skillsEmployees
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillsEmployees()
    {
        return $this->hasMany(SkillEmployee::className(), ['skills_id' => 'id']);
    }
}