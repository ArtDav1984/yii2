<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $messageid
 * @property int $courseid
 * @property string $timestamp
 * @property string $message
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }
}
