<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "salary".
 *
 * @property int $id
 * @property string $date
 * @property string $salary
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
            [['date'], 'safe'],
            [['salary'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'salary' => 'Salary',
        ];
    }
}
