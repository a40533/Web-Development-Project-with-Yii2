<?php

use yii\db\Migration;

/**
 * Class m230113_143745_create_table_books
 */
class m230113_143745_create_table_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books', [
            'id'=> $this->primaryKey()->unsigned(),
            'genre'=>$this->string(255)->notNull(),
            'genre_id'=>$this->integer(10)->notNull()->unsigned(),
            'book_name'=>$this->string(45)->notNull(),
            'author_name'=>$this->string(255)->notNull(),
            'publication_date'=>$this->integer(25)->notNull(),            
        ]);

        $this->batchInsert('books', ['genre', 'genre_id', 'book_name', 'author_name', 'publication_date'], [
            ['Action', '1', 'Rocky', 'Stephen H. Flammings', '1970'],
            ['Sci-Fi', '2', 'Blade Runner', 'Alan E. Nourse', '1974'],
            ['Action', '1','Avengers', 'Stann Lee', '1958'],
            ['Romance', '3','Love', 'Wendell C. Edwards', '2001'],
            ['Fantasy', '4','Meadows', 'W. C. Tattered-Gun', '2008'],
            ['Adventure', '5','Simba', 'Meadows Willblood', '1980'],
        ]);

        $this->createIndex('idx_books_genre_id_genre', 'books', 'genre_id');
        $this->addForeignKey('fk_books_genre_id_genre', 'books', 'genre_id', 'genre', 'id', 'restrict', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_books_genre_id_genre', 'books', 'genre_id');
        $this->dropIndex('idx_books_genre_id_genre', 'books', 'genre_id');

        $this->delete('books');

        $this->dropTable('books');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230113_143745_create_table_books cannot be reverted.\n";

        return false;
    }
    */
}
