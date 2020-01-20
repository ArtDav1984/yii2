<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'first_name', 'last_name'], 'required'],
            [['id'], 'integer'],
            [['first_name'], 'string', 'max' => 255],
            [['last_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }
}
