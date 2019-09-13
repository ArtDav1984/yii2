<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departments}}`.
 */
class m190911_073541_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departments}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
	
	    $this->insert('{{%departments}}', [
		    'name' => 'sales',
	    ]);
	
	    $this->insert('{{%departments}}', [
		    'name' => 'development',
	    ]);
	
	    $this->insert('{{%departments}}', [
		    'name' => 'financial',
	    ]);
	
	    $this->insert('{{%departments}}', [
		    'name' => 'HR',
	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%departments}}');
    }
}
