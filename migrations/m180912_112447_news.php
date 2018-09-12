<?php

use yii\db\Migration;

/**
 * Class m180912_112447_news
 */
class m180912_112447_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'tags' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'content' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('news');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180912_112447_news cannot be reverted.\n";

        return false;
    }
    */
}
