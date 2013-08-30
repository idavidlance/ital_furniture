<?php

class m130820_070635_create_article_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_article', array(
		    'id' => 'pk',
		    'title' => 'string NOT NULL',
		    'text' => 'text NOT NULL',
		    'create_time' => 'datetime DEFAULT NULL',
		    'create_user_id' => 'int(11) DEFAULT NULL',
		    'update_time' => 'datetime DEFAULT NULL',
		    'update_user_id' => 'int(11) DEFAULT NULL')
		);
	}

	public function down()
	{
		$this->dropTable('tbl_article');
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