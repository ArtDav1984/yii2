<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skills}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%departments}}`
 */
class m190911_023856_create_skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skills}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%skills}}');
    }
}
