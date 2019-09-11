<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "jobcategories".
 *
 * @property int $categoryid
 * @property string $category
 * @property string $location
 * @property string $comment
 * @property int $active
 *
 * @property Jobs[] $jobs
 */
class Jobcategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobcategories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'location', 'comment', 'active'], 'required'],
            [['category', 'location', 'comment'], 'string'],
            [['active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoryid' => 'Categoryid',
            'category' => 'Category',
            'location' => 'Location',
            'comment' => 'Comment',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Jobs::className(), ['jobcategoryid' => 'categoryid']);
    }
}
