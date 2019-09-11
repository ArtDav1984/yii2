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
            'companies_id' => $this->integer()->notNull(),
            'name' => $this->string(),
        ]);

        // creates index for column `companies_id`
        $this->createIndex(
            '{{%idx-departments-companies_id}}',
            '{{%departments}}',
            'companies_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-departments-companies_id}}',
            '{{%departments}}',
            'companies_id',
            '{{%companies}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%companies}}`
        $this->dropForeignKey(
            '{{%fk-departments-companies_id}}',
            '{{%departments}}'
        );

        // drops index for column `companies_id`
        $this->dropIndex(
            '{{%idx-departments-companies_id}}',
            '{{%departments}}'
        );

        $this->dropTable('{{%departments}}');
    }
}
