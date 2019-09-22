<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skills}}`.
 */
class m190911_073004_create_skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skills}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string()->null()
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
