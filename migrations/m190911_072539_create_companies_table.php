<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m190911_072539_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'Brain Fors',
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'IT Space',
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'GITC',
	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companies}}');
    }
}
