<?php

use yii\db\Migration;

/**
 * Class m190711_093507_book
 */
class m190711_093507_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('book', [
            'id' => $this->bigPrimaryKey(),
            'author_id' => $this->bigInteger(),
            'name' => $this->string(),
            'pages' => $this->smallInteger(),
            'year' => $this->smallInteger(),
            'publisher' => $this->string(),
            'cover' => $this->smallInteger(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger(),
        ]);
        $this->createIndex('book-aid', 'book', 'author_id');
        $this->addForeignKey('book-to-author', 'book', 'author_id', 'author', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('book-to-author','book');
        $this->dropIndex('book-aid','book');
        $this->dropTable('book');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190711_093507_book cannot be reverted.\n";

        return false;
    }
    */
}
