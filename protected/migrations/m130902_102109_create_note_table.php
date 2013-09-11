<?php

class m130902_102109_create_note_table extends CDbMigration
{
	/*public function up()
	{
	}

	public function down()
	{
		echo "m130902_102109_create_note_table does not support migration down.\n";
		return false;
	}*/

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_note', array(
			'id' => 'pk',
			'furniture_id' => 'int(11) DEFAULT NULL',
			'create_user_id' => 'int(11) DEFAULT NULL',
			'create_time' => 'datetime DEFAULT NULL',	      	
	      	'update_time' => 'datetime DEFAULT NULL',
	      	'update_user_id' => 'int(11) DEFAULT NULL'));
		
		//$this->addForeignKey("fk_note_furniture","tbl_note", "furniture_id","tbl_furniture","id","CASCADE","RESTRICT");
		//$this->addForeignKey("fk_note_user","tbl_note", "create_user_id","tbl_user","id","CASCADE","RESTRICT");
		//$this->addForeignKey("fk_note_update_user","tbl_note", "update_user_id","tbl_user","id","CASCADE","RESTRICT");
	}

	public function safeDown()
	{
		//$this->dropForeignKey('fk_note_furniture', 'tbl_note');
	    //$this->dropForeignKey('fk_note_user', 'tbl_note');
	    //$this->dropForeignKey('fk_note_update_user', 'tbl_note');
	    $this->dropTable('tbl_note');
	}
	
}