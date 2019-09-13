<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skills_employees}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%skills}}`
 * - `{{%employees}}`
 */
class m190911_080802_create_skills_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skills_employees}}', [
            'id' => $this->primaryKey(),
            'skills_id' => $this->integer()->notNull(),
            'employees_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `skills_id`
        $this->createIndex(
            '{{%idx-skills_employees-skills_id}}',
            '{{%skills_employees}}',
            'skills_id'
        );

        // add foreign key for table `{{%skills}}`
        $this->addForeignKey(
            '{{%fk-skills_employees-skills_id}}',
            '{{%skills_employees}}',
            'skills_id',
            '{{%skills}}',
            'id',
            'CASCADE'
        );

        // creates index for column `employees_id`
        $this->createIndex(
            '{{%idx-skills_employees-employees_id}}',
            '{{%skills_employees}}',
            'employees_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-skills_employees-employees_id}}',
            '{{%skills_employees}}',
            'employees_id',
            '{{%employees}}',
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
            '{{%fk-skills_employees-skills_id}}',
            '{{%skills_employees}}'
        );

        // drops index for column `skills_id`
        $this->dropIndex(
            '{{%idx-skills_employees-skills_id}}',
            '{{%skills_employees}}'
        );

        // drops foreign key for table `{{%employees}}`
        $this->dropForeignKey(
            '{{%fk-skills_employees-employees_id}}',
            '{{%skills_employees}}'
        );

        // drops index for column `employees_id`
        $this->dropIndex(
            '{{%idx-skills_employees-employees_id}}',
            '{{%skills_employees}}'
        );

        $this->dropTable('{{%skills_employees}}');
    }
}
