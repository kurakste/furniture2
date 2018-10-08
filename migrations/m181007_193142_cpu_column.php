<?php

use yii\db\Migration;

/**
 * Class m181007_193142_cpu_column
 */
class m181007_193142_cpu_column extends Migration
{

    public function up()
    {
        $this->addColumn('items', 'cpu', $this->string(256));   
//        $this->createIndex('index-items-cpu', 'items', 'cpu', $unique = true );
    }

    public function down()
    {
        
        $this->dropColumn('items', 'cpu');   
//        $this->dropIndex('index-items-cpu', 'items');
    }
}
