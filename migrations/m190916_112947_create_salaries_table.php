<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%salaries}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employees}}`
 */
class m190916_112947_create_salaries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%salaries}}', [
            'id' => $this->primaryKey(),
            'employees_id' => $this->integer()->notNull(),
            'create_at' => $this->date()->notNull(),
            'salary' => $this->integer()->notNull(),
        ]);

        // creates index for column `employees_id`
        $this->createIndex(
            '{{%idx-salaries-employees_id}}',
            '{{%salaries}}',
            'employees_id'
        );

        // add foreign key for table `{{%employees}}`
        $this->addForeignKey(
            '{{%fk-salaries-employees_id}}',
            '{{%salaries}}',
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
            '{{%fk-salaries-employees_id}}',
            '{{%salaries}}'
        );

        // drops index for column `employees_id`
        $this->dropIndex(
            '{{%idx-salaries-employees_id}}',
            '{{%salaries}}'
        );

        $this->dropTable('{{%salaries}}');
    }
}
