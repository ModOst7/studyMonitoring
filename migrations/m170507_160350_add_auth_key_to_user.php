<?php

use yii\db\Migration;

class m170507_160350_add_auth_key_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'auth_key', 'string UNIQUE');
    }

    public function down()
    {
        $this->dropColumn('user', 'auth_key');
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
