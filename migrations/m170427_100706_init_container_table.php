<?php

use yii\db\Migration;

class m170427_100706_init_container_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'container',
            [
                'id' => 'pk',
                'year' => 'int',
                'month' => 'int'
            ],
            'ENGINE=InnoDB'
            );
    }

    public function down()
    {
        $this->dropTable('container');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
