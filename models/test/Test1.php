<?php
namespace app\models\test;
use yii\base\Model;
use yii\db\ActiveRecord;

class Test extends ActiveRecord
{

	/** @var number */
	public $course;

	/** @var string */
	public $groupName;

	/** @var number */
	public $groupNumber;

	/** @var string */
	public $teacherName;

	/** @var string */
	public $subject;

	/** @var number */
	public $allStudents;

	/** @var number */
	public $completeStudents;

	/** @var number */
	public $markFive;

	/** @var number */
	public $markFour;

	/** @var number */
	public $markThree;

	/** @var number */
	public $markTwo;

	/** @var number */
	public $averageScore;

	/** @var number */
	public $academicPerfomance;

	/** @var number */
	public $quality;

	public function __construct( 
		$course, 
		$groupName, 
		$groupNumber, 
		$teacherName, 
		$subject, 
		$allStudents, 
		$completeStudents,
		$markFive,
		$markFour,
		$markThree,
		$markTwo
	)
	{
		$this->course = $course; 
		$this->groupName = $groupName; 
		$this->groupNumber = $groupNumber; 
		$this->teacherName = $teacherName; 
		$this->subject = $subject; 
		$this->allStudents = $allStudents; 
		$this->completeStudents = $completeStudents;
		$this->markFive = $markFive;
		$this->markFour = $markFour;
		$this->markThree = $markThree;
		$this->markTwo = $markTwo;
		$this->averageScore = intval(ceil((5*$markFive + 4*$markFour + 3*$markThree + 2*$markTwo)/$completeStudents));
		$this->academicPerfomance = intval(ceil(($markFive + $markFour + $markThree)*100/$allStudents));
		$this->quality = intval(ceil(($markFive + $markFour)*100/$allStudents));
		//...
	}
}