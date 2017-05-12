<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\test\Test;
use app\models\test\TestRecord;
use yii\data\ArrayDataProvider;

class TestsController extends Controller
{
	public function actionIndex()
	{
		$records = $this->findRecordsByQuery();
		return $this->render('index', compact('records'));
	}

	private function store(Test $test)
	{
		$test_record = new TestRecord();
		$test_record->course = $test->course; 
		$test_record->groupName = $test->groupName; 
		$test_record->groupNumber = $test->groupNumber; 
		$test_record->teacherName = $test->teacherName; 
		$test_record->subject = $test->subject; 
		$test_record->allStudents = $test->allStudents; 
		$test_record->completeStudents = $test->completeStudents;
		$test_record->markFive = $test->markFive;
		$test_record->markFour = $test->markFour;
		$test_record->markThree = $test->markThree;
		$test_record->markTwo = $test->markTwo;
		$test_record->averageScore = $test->averageScore;
		$test_record->academicPerfomance = $test->academicPerfomance;
		$test_record->quality = $test->quality;

		$test_record->save();
	}

	private function makeTest(TestRecord $test_record)
	{
		$course = $test_record->course; 
		$groupName = $test_record->groupName; 
		$groupNumber = $test_record->groupNumber; 
		$teacherName = $test_record->teacherName; 
		$subject = $test_record->subject; 
		$allStudents = $test_record->allStudents; 
		$completeStudents = $test_record->completeStudents;
		$markFive = $test_record->markFive;
		$markFour = $test_record->markFour;
		$markThree = $test_record->markThree;
		$markTwo = $test_record->markTwo;
		//$averageScore = $test_record->averageScore;
		//$academicPerfomance = $test_record->academicPerfomance;
		//$quality = $test_record->quality;

		$test = new Test( 
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
			);

		return $test;
	}

	public function actionAdd()
	{
		$test = new TestRecord;

		if ($this->load($test, $_POST))
		{
			$this->store($this->makeTest($test));
			return $this->redirect('@web/tests/');
		}

		return $this->render('add', compact('test'));
	}

	private function load(TestRecord $test, array $post)
	{
		return $test->load($post) and $test->validate();
	}

	private function findRecordsByQuery()
	{
		$course = \Yii::$app->request->get('course');
		$records = $this->getRecordsByCourse($course);
		$dataProvider = $this->wrapIntoDataProvider($records);
		return $dataProvider;
	}

	private function wrapIntoDataProvider($data)
	{
		return new ArrayDataProvider(
			[
			    'allModels' => $data,
			    'pagination' => false
			]
		);
	}

	private function getRecordsByCourse($course)
	{
		$test_record = TestRecord::findAll(['course' => $course]);
		if (!$test_record)
			return [];

		$puks = [];
		foreach ($test_record as $key) {
			$puks[] = $this->makeTest($key);
		}
		return $puks;//[$this->makeTest($test_record)];
	}

	public function actionQuery()
	{
		return $this->render('query');
	}

}