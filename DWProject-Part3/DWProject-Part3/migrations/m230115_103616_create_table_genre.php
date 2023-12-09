<?php

use yii\db\Migration;

/**
 * Class m230115_103616_create_table_genre
 */
class m230115_103616_create_table_genre extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('genre', [
            'id'=>$this->primaryKey()->unsigned(),
            'genre_name'=>$this->string(255)->notNull(),
            'description'=>$this->string(1024),            
        ]);

        $this->batchInsert('genre', ['genre_name', 'description'], [
            ['Action', 'fast-paced and include a lot of action like fight scenes, chase sceness'],
            ['Sci-Fi', 'a genre of speculative fiction'],
            ['Romance', 'a central love story between characters'],
            ['Fantasy', 'a genre that typically features the use of magic or other supernatural phenomena in the plot, setting, or theme'],
            ['Adventure', 'a genre where the protagonist goes on an epic journey, either personally or geographically'],
            ['Historical', 'fictionalized stories that are set in the documented past'],
            ['Sports', 'made up of stories where a sport has an impact on the plot or main character'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->delete('genre');

       $this->dropTable('genre');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230115_103616_create_table_genre cannot be reverted.\n";

        return false;
    }
    */
}
