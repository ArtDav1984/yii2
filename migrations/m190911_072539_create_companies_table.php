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
	        'img_path' => $this->string()->notNull()
        ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'Brain Fors',
		    'img_path' => 'brain_fors.jpg'
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'ITSpace LLC',
		    'img_path' => 'it_space.jpg'
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'ResAl Soft LLC',
		    'img_path' => 'resal_soft.png'
	    ]);
	
	    $this->insert('{{%companies}}', [
		    'name' => 'VOLO',
		    'img_path' => 'volo.png'
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
