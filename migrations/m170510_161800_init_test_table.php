<?php

use yii\db\Migration;

class m170510_161800_init_test_table extends Migration
{
    public function up()
    {
        $this->createTable('test', 
            [
                'id' => 'pk',
                'container_id' => 'int not null',
                'specialty_id' => 'int not null',
                'course' => 'int',
                'groupName' => 'string',
                'groupNumber' => 'int',
                'teacherName' => 'string',
                'subject' => 'string',
                'allStudents' => 'int',
                'completeStudents' => 'int',
                'markFive' => 'int',
                'markFour' => 'int',
                'markThree' => 'int',
                'markTwo' => 'int',
                'averageScore' => 'float',
                'academicPerfomance' => 'float',
                'quality' => 'float'
            ],
            'ENGINE=InnoDB');
        $this->addForeignKey('container_tests', 'test', 'container_id', 'container', 'id');
        $this->addForeignKey('specialty', 'test', 'specialty_id', 'specialty', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('container_tests', 'test');
        $this->dropForeignKey('specialty', 'test');
        $this->dropTable('test');
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
