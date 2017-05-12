<?php
use app\models\test\TestRecord;
use app\models\test\Test;
use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/**
*@var TestRecord $test
*/

$form = ActiveForm::begin([
	'id' => 'add-test-form',
	'options' => [
	    'class' => 'form-horizontal col-lg-11',
	    'enctype' => 'multipart/form-data'
	],
]);

echo $form->errorSummary([$test]);
echo $form->field($test, 'course')->radioList([
	'1' => '1',
	'2' => '2',
	'3' => '3',
	'4' => '4'
])->label('Курс');
echo $form->field($test, 'groupName')->dropDownList([
	'ЗО' => 'ЗО',
	'ТМ' => 'ТМ',
	'КСК' => 'КСК',
	'ПКС' => 'ПКС',
	'РТ' => 'РТ',
	'ЭП' => 'ЭП',
	'ЭО' => 'ЭО',
],
[
	'prompt' => 'Выберите специальность'
])->label('Специальность');
echo $form->field($test, 'groupNumber')->dropDownList([
	'11' => '11',
	'12' => '12',
	'13' => '13',
	'21' => '21',
	'22' => '22',
	'23' => '23',
	'31' => '31',
	'32' => '32',
	'33' => '33',
	'41' => '41',
	'42' => '42',
	'43' => '43',
],
[
	'prompt' => 'Выберите номер группы'
])->label('Номер группы');
echo $form->field($test, 'teacherName')->textInput(['placeholder' => 'Педров П.П.'])->label('Преподаватель');
echo $form->field($test, 'subject')->textInput(['placeholder' => 'Математика'])->label('Дисциплина');
echo $form->field($test, 'allStudents')->textInput()->label('Всего студентов');
echo $form->field($test, 'completeStudents')->textInput()->label('Студентов выполнило');
echo $form->field($test, 'markFive')->textInput()->label('Оценка "5"');
echo $form->field($test, 'markFour')->textInput()->label('Оценка "4"');
echo $form->field($test, 'markThree')->textInput()->label('Оценка "3"');
echo $form->field($test, 'markTwo')->textInput()->label('Оценка "2"');
echo Html::submitButton('Добавить', ['class' => 'btn btn-primary']);

ActiveForm::end();