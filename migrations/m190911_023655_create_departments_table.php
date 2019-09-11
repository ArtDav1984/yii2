<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%companies}}`
 */
class m190911_023655_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departments}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%departments}}');
    }
}
