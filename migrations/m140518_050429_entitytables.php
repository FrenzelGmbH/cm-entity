<?php

/**
 * The migration script for the communication
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @copyright Frenzel GmbH
 * @version 1.0
 */

use yii\db\Schema;

class m140518_050429_entitytables extends \yii\db\Migration
{
	public function up()
	{
    
    switch (Yii::$app->db->driverName) {
      case 'mysql':
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        break;
      case 'pgsql':
        $tableOptions = null;
        break;
      default:
        throw new RuntimeException('Your database is not supported!');
    }

		$this->createTable('{{%entity}}',[
      'id'                => Schema::TYPE_PK,
      'parent_id'         => Schema::TYPE_INTEGER.' DEFAULT NULL',
      'name'              => Schema::TYPE_STRING .'(100)',
      'prename'           => Schema::TYPE_STRING .'(100)',
      'name_two'          => Schema::TYPE_STRING .'(100)',
      'name_three'        => Schema::TYPE_STRING .'(100)',
      'official_one'      => Schema::TYPE_STRING .'(60)',
      'official_two'      => Schema::TYPE_STRING .'(60)',
      //possible reference to user
      'user_id'           => Schema::TYPE_INTEGER.' NULL',
      //module fields
      'mod_table'         => Schema::TYPE_STRING .'(100)',
      'mod_id'            => Schema::TYPE_INTEGER.' NULL',
      //interface fields
      'system_key'        => Schema::TYPE_STRING .'(100)',
      'system_name'       => Schema::TYPE_STRING .'(100)',
      'system_upate'      => Schema::TYPE_INTEGER.' DEFAULT NULL',
      // timestamps
      'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
      'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
      'deleted_at'        => Schema::TYPE_INTEGER . ' DEFAULT NULL',
      //Foreign Keys
      'entity_type_id'    => Schema::TYPE_INTEGER.' DEFAULT NULL',
    ],$tableOptions);

    $this->addForeignKey('fk_entity_entity_parent', '{{%entity}}', 'parent_id', '{{%entity}}', 'id', 'CASCADE', 'RESTRICT');

    $this->createTable('{{%entity_type}}',[
      'id'                => Schema::TYPE_PK,
      'name'              => Schema::TYPE_STRING .'(100)',
      'parent_id'         => Schema::TYPE_INTEGER.' DEFAULT NULL',
      //possible reference to user
      'user_id'           => Schema::TYPE_INTEGER.' NULL',
      //interface fields
      'system_key'        => Schema::TYPE_STRING .'(100)',
      'system_name'       => Schema::TYPE_STRING .'(100)',
      'system_upate'      => Schema::TYPE_INTEGER.' DEFAULT NULL',
      // timestamps
      'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
      'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
      'deleted_at'        => Schema::TYPE_INTEGER . ' DEFAULT NULL'
    ],$tableOptions);

    $this->addForeignKey('fk_entity_type_entity_parent', '{{%entity_type}}', 'parent_id', '{{%entity_type}}', 'id', 'CASCADE', 'RESTRICT');
    $this->addForeignKey('fk_entity_type_entity_type', '{{%entity}}', 'entity_type_id', '{{%entity_type}}', 'id', 'CASCADE', 'RESTRICT');

	}

	public function down()
	{
		//drop FK's first
    $this->dropForeignKey('fk_entity_entity_type', '{{%entity}}');
    $this->dropForeignKey('fk_entity_entity_parent', '{{%entity}}');
    $this->dropForeignKey('fk_entity_type_entity_parent', '{{%entity_type}}');

    $this->dropTable('{{%entity_type}}');
		$this->dropTable('{{%entity}}');
	}
}
