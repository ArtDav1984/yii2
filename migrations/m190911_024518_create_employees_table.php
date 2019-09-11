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
            'skills_id' => $this->integer()->notNull(),
            'departments_id' => $this->integer()->notNull(),
            'salary_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string(),
            'address' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
        ]);

        // creates index for column `skills_id`
        $this->createIndex(
            '{{%idx-employees-skills_id}}',
            '{{%employees}}',
            'skills_id'
        );

        // add foreign key for table `{{%skills}}`
        $this->addForeignKey(
            '{{%fk-employees-skills_id}}',
            '{{%employees}}',
            'skills_id',
            '{{%skills}}',
            'id',
            'CASCADE'
        );

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

        // creates index for column `salary_id`
        $this->createIndex(
            '{{%idx-employees-salary_id}}',
            '{{%employees}}',
            'salary_id'
        );

        // add foreign key for table `{{%salary}}`
        $this->addForeignKey(
            '{{%fk-employees-salary_id}}',
            '{{%employees}}',
            'salary_id',
            '{{%salary}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%skills}}`
        $this->dropForeignKey(
            '{{%fk-employees-skills_id}}',
            '{{%employees}}'
        );

        // drops index for column `skills_id`
        $this->dropIndex(
            '{{%idx-employees-skills_id}}',
            '{{%employees}}'
        );

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

        // drops foreign key for table `{{%salary}}`
        $this->dropForeignKey(
            '{{%fk-employees-salary_id}}',
            '{{%employees}}'
        );

        // drops index for column `salary_id`
        $this->dropIndex(
            '{{%idx-employees-salary_id}}',
            '{{%employees}}'
        );

        $this->dropTable('{{%employees}}');
    }
}
