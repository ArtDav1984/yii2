<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%salary}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employees}}`
 */
class m190916_112947_create_salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%salary}}', [
            'id' => $this->primaryKey(),
            'employees_id' => $this->integer()->notNull(),
            'create_at' => $this->date()->notNull(),
            'salary' => $this->integer()->notNull(),
        ]);

        // creates index for column `employees_id`
        $this->createIndex(
            '{{%idx-salary-employees_id}}',
            '{{%salary}}',
            'employees_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-salary-employees_id}}',
            '{{%salary}}',
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
            '{{%fk-salary-employees_id}}',
            '{{%salary}}'
        );

        // drops index for column `employees_id`
        $this->dropIndex(
            '{{%idx-salary-employees_id}}',
            '{{%salary}}'
        );

        $this->dropTable('{{%salary}}');
    }
}
