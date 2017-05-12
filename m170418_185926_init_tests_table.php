<?php

use yii\db\Migration;

class m170418_185926_init_tests_table extends Migration
{
    public function up()
    {
        $this->createTable('test', 
            [
                'id' => 'pk',
                'date' => 'date',
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
    }

    public function down()
    {
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
