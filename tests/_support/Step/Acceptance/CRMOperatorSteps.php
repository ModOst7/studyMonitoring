<?php
namespace Step\Acceptance;

class CRMOperatorSteps extends \AcceptanceTester
{
	function amInAddTestUi()
	{
		$I = $this;
		$I->amOnPage('/tests/create?relation_id=5');
	}

	public function imagineCustomer($courses, $groups, $nums)
	{
		$allStudents = rand(10, 30);
		$completeStudents = rand(10, $allStudents);
		$comp = $completeStudents;

		$markFive = rand(0, $completeStudents);
		$completeStudents = $completeStudents - $markFive;

		$markFour = rand(0, $completeStudents);
		$completeStudents = $completeStudents - $markFour;

		$markThree = rand(0, $completeStudents);
		$completeStudents = $completeStudents - $markThree;

		$markTwo = $completeStudents;
		
		$faker = \Faker\Factory::create();
		return [
		    'Test[course]' => $courses,//$faker->name,
		    'Test[specialty_id]' => $groups,
		    'Test[groupNumber]' => $nums,
		    'Test[teacherName]' => $faker->name,
		    'Test[subject]' => $faker->name,
		    'Test[allStudents]' => $allStudents,
		    'Test[completeStudents]' => $comp,
		    'Test[markFive]' => $markFive,
		    'Test[markFour]' => $markFour,
		    'Test[markThree]' => $markThree,
		    'Test[markTwo]' => $markTwo,
		];
	}

	function fillCustomerDataForm($fieldsData)
	{
		$I = $this;
		foreach ($fieldsData as $key => $value)
			$I->fillField($key, $value);
	}

	function submitCustomerDataForm()
	{
		$I = $this;
		$I->click('Создать');
	}

	public function seeIAmInListCustomersUi()
	{
		$I = $this;
		$I->seeCurrentUrlMatches('/customers/');
	}

	function amInListCustomersUi()
	{
		$I = $this;
		$I->amOnPage('/customers');
	}
}