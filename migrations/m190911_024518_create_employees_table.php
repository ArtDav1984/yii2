<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%skills}}`
 * - `{{%departments}}`
 * - `{{%salary}}`
 */
class m190911_024518_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees}}', [
            'id' => $this->primaryKey(),
            'companies_id' => $this->integer()->notNull(),
            'departments_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string(),
            'address' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
        ]);

        // creates index for column `departments_id`
        $this->createIndex(
            '{{%idx-employees-departments_id}}',
            '{{%employees}}',
            'departments_id'
        );

        // add foreign key for table `{{%departments}}`
        $this->addForeignKey(
            '{{%fk-employees-departments_id}}',
            '{{%employees}}',
            'departments_id',
            '{{%departments}}',
            'id',
            'CASCADE'
        );

        // creates index for column `companies_id`
        $this->createIndex(
            '{{%idx-employees-companies_id}}',
            '{{%employees}}',
            'companies_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-employees-companies_id}}',
            '{{%employees}}',
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
        // drops foreign key for table `{{%departments}}`
        $this->dropForeignKey(
            '{{%fk-employees-departments_id}}',
            '{{%employees}}'
        );

        // drops index for column `departments_id`
        $this->dropIndex(
            '{{%idx-employees-departments_id}}',
            '{{%employees}}'
        );

        // drops foreign key for table `{{%companies}}`
        $this->dropForeignKey(
            '{{%fk-employees-companies_id}}',
            '{{%employees}}'
        );

        // drops index for column `companies_id`
        $this->dropIndex(
            '{{%idx-employees-companies_id}}',
            '{{%employees}}'
        );

        $this->dropTable('{{%employees}}');
    }
}
