<?php

class m130821_092955_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_user', array(
			'id' => 'pk',
			'username' => 'string',
			'password' => 'string',
			'email' => 'string',
			'last_login_time' => 'datetime DEFAULT NULL',
			'create_time' => 'datetime DEFAULT NULL',
	      	'create_user_id' => 'int(11) DEFAULT NULL',
	      	'update_time' => 'datetime DEFAULT NULL',
	      	'update_user_id' => 'int(11) DEFAULT NULL'));
	}

	public function down()
	{
		$this->dropTable('tbl_user');
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