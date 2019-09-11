<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%salary}}`.
 */
class m190911_023419_create_salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%salary}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'salary' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%salary}}');
    }
}
