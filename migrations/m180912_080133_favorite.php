<?php

use yii\db\Migration;

/**
 * Class m180912_080133_favorite
 */
class m180912_080133_favorite extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('favorite', [
            'id' => $this->primaryKey(),
            'iid' => $this->integer()->notNull()->unique(),
        ]);

         $this->addForeignKey(
            'fk-favorite-items',
            'favorite',
            'iid',
            'items',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('favorite');

        $this->dropForeignKey(
                    'fk-favorite-items',
                    'favorite'
                );
        

        return false;
    }

    }