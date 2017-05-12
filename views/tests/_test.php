<?php
echo \yii\widgets\DetailView::widget(
	[
	    'model' => $model,
	    'attributes' => [
	        ['attribute' => 'Курс', 'value' => $model->course],
	        ['attribute' => 'Специальность', 'value' => $model->groupName],
	        ['attribute' => 'Номер группы', 'value' => $model->groupNumber],
	        ['attribute' => 'Преподаватель', 'value' => $model->teacherName],
	        ['attribute' => 'Дисциплина', 'value' => $model->subject],
	        ['attribute' => 'Всего студентов', 'value' => $model->allStudents],
	        ['attribute' => 'Выполнило студентов', 'value' => $model->completeStudents],
	        ['attribute' => 'Оценка "5"', 'value' => $model->markFive],
	        ['attribute' => 'Оценка "4"', 'value' => $model->markFour],
	        ['attribute' => 'Оценка "3"', 'value' => $model->markThree],
	        ['attribute' => 'Оценка "2"', 'value' => $model->markTwo],
	        ['attribute' => 'Средний балл', 'value' => $model->averageScore],
	        ['attribute' => 'Успеваемость', 'value' => $model->academicPerfomance.'%'],
	        ['attribute' => 'Качество знаний', 'value' => $model->quality.'%']
	    ]
	]
);