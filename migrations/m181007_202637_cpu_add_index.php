<?php

use yii\db\Migration;

/**
 * Class m181007_202637_cpu_add_index
 */
class m181007_202637_cpu_add_index extends Migration
{

    public function up()
    {
        $this->createIndex('index-items-cpu', 'items', 'cpu', $unique = true );

    }

    public function down()
    {
        $this->dropIndex('index-items-cpu', 'items');
    }
}
