<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%salary}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 */
class m190912_071252_create_salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%salary}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'salary' => $this->string()->notNull(),
        ]);

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-salary-employee_id}}',
            '{{%salary}}',
            'employee_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-salary-employee_id}}',
            '{{%salary}}',
            'employee_id',
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
        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-salary-employee_id}}',
            '{{%salary}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-salary-employee_id}}',
            '{{%salary}}'
        );

        $this->dropTable('{{%salary}}');
    }
}
