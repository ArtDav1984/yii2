<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190922_213447_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string()->null(),
        ]);

        $this->insert('{{%users}}', [
            'username' => 'artdav',
            'password' => '$2y$13$eJMcxXLWDI.g7yH5T3J5Wule7UxgsL/3tje0rO6LRDgTKacYYRRzK' // 'artdav1984';
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
