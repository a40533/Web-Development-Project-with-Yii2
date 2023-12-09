<?php

use yii\db\Migration;

/**
 * Class m230113_144240_create_table_borrowed
 */
class m230113_144240_create_table_borrowed extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('borrowed', [
            'id'=>$this->primaryKey()->unsigned(),
            'book_id'=> $this->integer(10)->unsigned()->notNull(),
            'user_id'=>$this->integer(10)->unsigned()->notNull(),
            'borrowed_date'=>$this->string(255),
            'borrowed_time'=>$this->string(255),
            'return_date'=>$this->string(255),
        ]);

        $this->createIndex('idx_borrowed_user_id_user', 'borrowed', 'user_id');
        $this->addForeignKey('fk_borrowed_user_id_user', 'borrowed', 'user_id', 'user', 'id', 'restrict', 'cascade');

        $this->createIndex('idx_borrowed_book_id_books', 'borrowed', 'book_id');
        $this->addForeignKey('fk_borrowed_book_id_books', 'borrowed', 'book_id', 'books', 'id', 'restrict', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_borrowed_user_id_user', 'borrowed', 'user_id');
        $this->dropIndex('idx_borrowed_user_id_user', 'borrowed', 'user_id');

        $this->dropForeignKey('fk_borrowed_book_id_books', 'borrowed', 'book_id');
        $this->dropIndex('idx_borrowed_book_id_books', 'borrowed', 'book_id');


        $this->dropTable('borrowed');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230113_144240_create_table_borrowed cannot be reverted.\n";

        return false;
    }
    */
}
