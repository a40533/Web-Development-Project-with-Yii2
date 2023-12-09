<?php

use yii\db\Migration;

/**
 * Class m230113_091102_create_table_article
 */
class m230113_091102_create_table_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'ID'=> $this->primaryKey()->unsigned(),
            'Title'=>$this->string(1024)->notNull(),
            'slug'=>$this->string(1024)->notNull(),
            'Body'=>$this->string(2048)->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'created_by'=>$this->integer(10)->unsigned()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
        $this->createIndex('idx_article_created_by_user', 'article', 'created_by');
        $this->addForeignKey('fk_article_created_by_user', 'article', 'created_by', 'user', 'id', 'restrict', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_article_created_by_user', 'article');
        $this->dropIndex('idx_article_created_by_user', 'article');

        $this->dropTable('article');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230113_091102_create_table_article cannot be reverted.\n";

        return false;
    }
    */
}
