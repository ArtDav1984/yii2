<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%developments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%skills}}`
 * - `{{%employees}}`
 */
class m190916_112616_create_developments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%developments}}', [
            'id' => $this->primaryKey(),
            'skills_id' => $this->integer()->notNull(),
            'employees_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `skills_id`
        $this->createIndex(
            '{{%idx-developments-skills_id}}',
            '{{%developments}}',
            'skills_id'
        );

        // add foreign key for table `{{%skills}}`
        $this->addForeignKey(
            '{{%fk-developments-skills_id}}',
            '{{%developments}}',
            'skills_id',
            '{{%skills}}',
            'id',
            'CASCADE'
        );

        // creates index for column `employees_id`
        $this->createIndex(
            '{{%idx-developments-employees_id}}',
            '{{%developments}}',
            'employees_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-developments-employees_id}}',
            '{{%developments}}',
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
            '{{%fk-developments-skills_id}}',
            '{{%developments}}'
        );

        // drops index for column `skills_id`
        $this->dropIndex(
            '{{%idx-developments-skills_id}}',
            '{{%developments}}'
        );

        // drops foreign key for table `{{%employees}}`
        $this->dropForeignKey(
            '{{%fk-developments-employees_id}}',
            '{{%developments}}'
        );

        // drops index for column `employees_id`
        $this->dropIndex(
            '{{%idx-developments-employees_id}}',
            '{{%developments}}'
        );

        $this->dropTable('{{%developments}}');
    }
}
