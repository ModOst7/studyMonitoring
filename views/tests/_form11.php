<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\test\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course')->radioList([
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4'
])->label('Курс'); ?>

    <?= $form->field($model, 'groupName')->textInput(); ?>

    <?= $form->field($model, 'groupNumber')->textInput(); ?>

    <?= $form->field($model, 'teacherName')->textInput(['placeholder' => 'Педров П.П.'])->label('Преподаватель'); ?>

    <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Математика'])->label('Дисциплина'); ?>

    <?= $form->field($model, 'allStudents')->textInput()->label('Всего студентов'); ?>

    <?= $form->field($model, 'completeStudents')->textInput()->label('Студентов выполнило'); ?>

    <?= $form->field($model, 'markFive')->textInput()->label('Оценка "5"'); ?>

    <?= $form->field($model, 'markFour')->textInput()->label('Оценка "4"'); ?>

    <?= $form->field($model, 'markThree')->textInput()->label('Оценка "3"'); ?>

    <?= $form->field($model, 'markTwo')->textInput()->label('Оценка "2"'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
