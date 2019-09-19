<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees_skills}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employess}}`
 * - `{{%skills}}`
 */
class m190918_101451_create_employees_skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees_skills}}', [
            'id' => $this->primaryKey(),
            'employees_id' => $this->integer()->notNull(),
            'skills_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `employees_id`
        $this->createIndex(
            '{{%idx-employees_skills-employees_id}}',
            '{{%employees_skills}}',
            'employees_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-employees_skills-employees_id}}',
            '{{%employees_skills}}',
            'employees_id',
            '{{%employees}}',
            'id',
            'CASCADE'
        );

        // creates index for column `skills_id`
        $this->createIndex(
            '{{%idx-employees_skills-skills_id}}',
            '{{%employees_skills}}',
            'skills_id'
        );

        // add foreign key for table `{{%skills}}`
        $this->addForeignKey(
            '{{%fk-employees_skills-skills_id}}',
            '{{%employees_skills}}',
            'skills_id',
            '{{%skills}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%employees}}`
        $this->dropForeignKey(
            '{{%fk-employees_skills-employees_id}}',
            '{{%employees_skills}}'
        );

        // drops index for column `employees_id`
        $this->dropIndex(
            '{{%idx-employees_skills-employees_id}}',
            '{{%employees_skills}}'
        );

        // drops foreign key for table `{{%skills}}`
        $this->dropForeignKey(
            '{{%fk-employees_skills-skills_id}}',
            '{{%employees_skills}}'
        );

        // drops index for column `skills_id`
        $this->dropIndex(
            '{{%idx-employees_skills-skills_id}}',
            '{{%employees_skills}}'
        );

        $this->dropTable('{{%employees_skills}}');
    }
}
