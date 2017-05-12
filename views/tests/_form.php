<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\test\Specialty;

/* @var $this yii\web\View */
/* @var $model app\models\test\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); 
    $specialty = Specialty::find()->all();
    foreach ($specialty as $value) {
        $specArr[$value->id] = $value->name;
    }

    ?>

    <?= $form->field($model, 'course')->radioList([
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4'
])->label('Курс'); ?>

    <?= $form->field($model, 'specialty_id')->dropDownList($specArr,['prompt' => 'Выберите специальность'])->label('Специальность'); ?>

    <?= $form->field($model, 'groupNumber')->dropDownList([
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
])->label('Номер группы'); ?>

    <?= $form->field($model, 'teacherName')->textInput(['placeholder' => 'Педров П.П.'])->label('Преподаватель'); ?>

    <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Математика'])->label('Дисциплина'); ?>

    <?= $form->field($model, 'allStudents')->textInput()->label('Всего студентов'); ?>

    <?= $form->field($model, 'completeStudents')->textInput()->label('Студентов выполнило'); ?>

    <?= $form->field($model, 'markFive')->textInput()->label('Оценка "5"'); ?>

    <?= $form->field($model, 'markFour')->textInput()->label('Оценка "4"'); ?>

    <?= $form->field($model, 'markThree')->textInput()->label('Оценка "3"'); ?>

    <?= $form->field($model, 'markTwo')->textInput()->label('Оценка "2"'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
