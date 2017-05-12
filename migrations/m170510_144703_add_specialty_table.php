<?php

use yii\db\Migration;

class m170510_144703_add_specialty_table extends Migration
{
    public function up()
    {
        $this->createTable('specialty', 
            [
                'id' => 'pk',
                'name' => 'string'
            ],
            'ENGINE=InnoDB');
    }

    public function down()
    {
        $this->dropTable('specialty');
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
