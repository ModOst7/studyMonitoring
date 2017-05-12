<?php
namespace app\models\test;

use yii\db\ActiveRecord;

class TestRecord extends ActiveRecord
{
	public static function tableName()
	{
		return 'test';
	}

	public function rules()
	{
		return [
		    ['id', 'number'],
		    ['course', 'number'],
		    ['groupName', 'string', 'max' => 3],
		    ['groupName', 'in', 'range' => ['ЗО', 'ТМ', 'КСК', 'ПКС', 'РТ', 'ЭП', 'ЭО']],
		    ['groupNumber', 'number'],
		    ['groupNumber', 'in', 'range' => ['11', '12', '13', '21', '22', '23', '31', '32', '33', '41', '42', '43']],
		    ['teacherName', 'string', 'max' => 255],
		    ['subject', 'string', 'max' => 255],
		    ['allStudents', 'number'],
		    ['completeStudents', 'number'],
		    ['markFive', 'number'],
		    ['markFour', 'number'],
		    ['markThree', 'number'],
		    ['markTwo', 'number'],
		    /*['averageScore', 'number'],
		    ['academicPerfomance', 'number'],
		    ['quality', 'number'],*/
		    [
		        [
		            'date', 
		            'course', 
		            'groupName', 
		            'groupNumber', 
		            'allStudents', 
		            'completeStudents', 
		            'markFive', 
		            'markFour', 
		            'markThree', 
		            'markTwo'
		        ],
		        'required'
		    ]
		];
	}


}