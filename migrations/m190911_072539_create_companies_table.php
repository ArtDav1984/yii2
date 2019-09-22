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
	        'image' => $this->string()->notNull()
        ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'Brain Fors',
		    'image' => 'brain_fors.jpg'
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'ITSpace LLC',
		    'image' => 'it_space.jpg'
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'ResAl Soft LLC',
		    'image' => 'resal_soft.png'
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'VOLO',
		    'image' => 'volo.png'
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
