<?php

class m130821_044927_create_shop_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_shop',array(
	      'id' => 'pk',
	      'name' => 'string NOT NULL',
	      'description' => 'text',


	      'create_time' => 'datetime DEFAULT NULL',
	      'create_user_id' => 'int(11) DEFAULT NULL',
	      'update_time' => 'datetime DEFAULT NULL',
	      'update_user_id' => 'int(11) DEFAULT NULL'
       ));
	}

	public function down()
	{
		$this->drorTable('tbl_shop');
	}
	
	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{		
	}

	public function safeDown()
	{
	}
	*/
}