<?php
$I = new \Step\Acceptance\CRMOperatorSteps($scenario);
$I->wantTo('add two different customers to database');

$courses = [1, 2, 3, 4];
$groups = [1,2,3,4,5,6,7];
$nums = [11, 12, 13, 21, 22, 23, 31, 32, 33, 41, 42, 43];

//$I->amInAddTestUi();

foreach ($courses as $coursesValue) {
	foreach ($groups as  $groupsValue) {
		foreach ($nums as $numsValue) {
			$I->amInAddTestUi();
			$first_customer = $I->imagineCustomer($coursesValue, $groupsValue, $numsValue);
			$I->fillCustomerDataForm($first_customer);
            $I->submitCustomerDataForm();
		}
	}
}
//$first_customer = $I->imagineCustomer();
//$I->fillCustomerDataForm($first_customer);
//$I->submitCustomerDataForm();
/*
$I->seeIAmInListCustomersUi();

$I->amInAddCustomerUi();
$second_customer = $I->imagineCustomer();
$I->fillCustomerDataForm($second_customer);
$I->submitCustomerDataForm();

$I->seeIAmInListCustomersUi();

$I = new \Step\Acceptance\CRMUserSteps($scenario);
$I->wantTo('query the customer info using his phone number');

$I->amInQueryCustomerUi();
$I->fillInPhoneFieldWithDataFrom($first_customer);
$I->clickSearchButton();

$I->seeIAmInListCustomersUi();
$I->seeCustomerInList($first_customer);
$I->dontSeeCustomerInList($second_customer);*/