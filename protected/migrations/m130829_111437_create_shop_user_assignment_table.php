<?php

class m130829_111437_create_shop_user_assignment_table extends CDbMigration
{
	/*public function up()
	{
		
	}

	public function down()
	{
		
	}*/

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_shop_user_assignment',array(
			'shop_id' => 'int(11) DEFAULT NULL',
			'user_id' => 'int(11) DEFAULT NULL',
			'role' => 'varchar(64)'));

		$this->addForeignKey("fk_shop_user", "tbl_shop_user_assignment", "shop_id", "tbl_shop", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_user_shop", "tbl_shop_user_assignment", "user_id", "tbl_user", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey('fk_shop_user_role', 'tbl_shop_user_assignment', 'role', 'tbl_auth_item', 'name', 'CASCADE', 'CASCADE');
	}

	public function safeDown()
	{
		//$this->dropForeignKey('fk_shop_user','tbl_shop_user_assignment');
		//$this->dropForeignKey('fk_user_shop','tbl_shop_user_assignment');
		//$this->dropForeignKey('fk_shop_user_role','tbl_shop_user_assignment');
		$this->dropTable('tbl_shop_user_assignment');
	}
	
}