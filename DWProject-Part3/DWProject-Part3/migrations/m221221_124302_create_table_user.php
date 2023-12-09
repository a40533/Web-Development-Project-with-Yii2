<?php

use yii\db\Migration;

/**
 * Class m221221_124302_create_table_user
 */
class m221221_124302_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id'=> $this->primaryKey()->unsigned(),
            'username'=>$this->string(45)->notNull(),
            'password'=>$this->string(255)->notNull(),
            'auth_key'=>$this->string(255)->notNull(),
            'access_token'=>$this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221221_124302_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
