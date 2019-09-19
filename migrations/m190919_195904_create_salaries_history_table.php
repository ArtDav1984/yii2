<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%salaries_history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employees}}`
 */
class m190919_195904_create_salaries_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%salaries_history}}', [
            'id' => $this->primaryKey(),
            'employees_id' => $this->integer()->notNull(),
            'created_at' => $this->date()->notNull(),
            'salary' => $this->integer()->notNull(),
        ]);

        // creates index for column `employees_id`
        $this->createIndex(
            '{{%idx-salaries_history-employees_id}}',
            '{{%salaries_history}}',
            'employees_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-salaries_history-employees_id}}',
            '{{%salaries_history}}',
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
        // drops foreign key for table `{{%employees}}`
        $this->dropForeignKey(
            '{{%fk-salaries_history-employees_id}}',
            '{{%salaries_history}}'
        );

        // drops index for column `employees_id`
        $this->dropIndex(
            '{{%idx-salaries_history-employees_id}}',
            '{{%salaries_history}}'
        );

        $this->dropTable('{{%salaries_history}}');
    }
}
