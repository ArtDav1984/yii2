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
            'departments_id' => $this->integer()->notNull(),
            'name' => $this->string(),
        ]);

        // creates index for column `departments_id`
        $this->createIndex(
            '{{%idx-skills-departments_id}}',
            '{{%skills}}',
            'departments_id'
        );

        // add foreign key for table `{{%departments}}`
        $this->addForeignKey(
            '{{%fk-skills-departments_id}}',
            '{{%skills}}',
            'departments_id',
            '{{%departments}}',
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
            '{{%fk-skills-departments_id}}',
            '{{%skills}}'
        );

        // drops index for column `departments_id`
        $this->dropIndex(
            '{{%idx-skills-departments_id}}',
            '{{%skills}}'
        );

        $this->dropTable('{{%skills}}');
    }
}
