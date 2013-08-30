<?php

class m130821_045221_create_furniture_category_type_and_assignment_tables extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m130820_110542_create_category_type_furniture_tables does not support migration down.\n";
		return false;
	}

	*/
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_category',array(
			'id' => 'pk',
	    	'name' => 'string NOT NULL',

	    	'create_time' => 'datetime DEFAULT NULL',
	      	'create_user_id' => 'int(11) DEFAULT NULL',
	      	'update_time' => 'datetime DEFAULT NULL',
	      	'update_user_id' => 'int(11) DEFAULT NULL'));

		$this->createTable('tbl_type',array(
			'id' => 'pk', 
			'caption' => 'string NOT NULL',

			'create_time' => 'datetime DEFAULT NULL',
	      	'create_user_id' => 'int(11) DEFAULT NULL',
	      	'update_time' => 'datetime DEFAULT NULL',
	      	'update_user_id' => 'int(11) DEFAULT NULL'));

		$this->createTable('tbl_furniture',array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'description' => 'text',
			'shop_id' => 'int(11) DEFAULT NULL',
			'category_id' => 'int(11) DEFAULT NULL',
			'type_id' => 'int(10) DEFAULT NULL',
			'style' => 'string',
			'color' => 'string',
			'material' => 'string',
			'size' => 'string',
			'country' => 'string',
			'price' => 'int DEFAULT NULL',


			'create_time' => 'datetime DEFAULT NULL',
	      	'create_user_id' => 'int(11) DEFAULT NULL',
	      	'update_time' => 'datetime DEFAULT NULL',
	      	'update_user_id' => 'int(11) DEFAULT NULL'));

		//foreign key relationships
		    
		$this->addForeignKey("fk_furniture_category", "tbl_furniture", "category_id", "tbl_category", "id", "CASCADE", "RESTRICT");		    
		$this->addForeignKey("fk_furniture_type", "tbl_furniture", "type_id",	"tbl_type", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_furniture_shop", "tbl_furniture", "shop_id",	"tbl_shop", "id", "CASCADE", "RESTRICT");
		    
		    /*$this->addForeignKey("fk_furniture_create_user", "tbl_furniture", "create_user_id",	"tbl_user", "id", "CASCADE", "RESTRICT");

			$this->addForeignKey("fk_category_create_user", "tbl_category", "create_user_id",	"tbl_user", "id", "CASCADE", "RESTRICT");		    
			$this->addForeignKey("fk_category_update_user", "tbl_category", "update_user_id",	"tbl_user", "id", "CASCADE", "RESTRICT");		    

			$this->addForeignKey("fk_type_create_user", "tbl_category", "create_user_id",	"tbl_user", "id", "CASCADE", "RESTRICT");		    
			$this->addForeignKey("fk_category_update_user", "tbl_category", "update_user_id",	"tbl_user", "id", "CASCADE", "RESTRICT");		    
			*/
	}

	public function safeDown()
	{
		$this->truncateTable('tbl_furniture');
	    $this->truncateTable('tbl_type');
	    $this->truncateTable('tbl_category');
	    $this->dropTable('tbl_furniture');
	    $this->dropTable('tbl_type');
	    $this->dropTable('tbl_category');
	}
	
}