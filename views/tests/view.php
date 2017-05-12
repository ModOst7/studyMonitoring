<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\test\Specialty;

/* @var $this yii\web\View */
/* @var $model app\models\test\Test */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'container_id',
            [
                'label' => 'Курс',
                'value' => $model->course
            ],
            [
                'label' => 'Специальность',
                'value' => function($model){ return Specialty::findOne(['id' => $model->specialty_id])->name;}
            ],
            [
                'label' => 'Номер группы',
                'value' => $model->groupNumber
            ],
            [
                'label' => 'Преподаватель',
                'value' => $model->teacherName
            ],
            [
                'label' => 'Предмет',
                'value' => $model->subject
            ],
            [
                'label' => 'Всего студентов',
                'value' => $model->allStudents
            ],
            [
                'label' => 'Выполнило студентов',
                'value' => $model->completeStudents
            ],
            [
                'label' => 'Оценка "5"',
                'value' => $model->markFive
            ],
            [
                'label' => 'Оценка "4"',
                'value' => $model->markFour
            ],
            [
                'label' => 'Оценка "3"',
                'value' => $model->markThree
            ],
            [
                'label' => 'Оценка "2"',
                'value' => $model->markTwo
            ],
            [
                'label' => 'Средний балл',
                'value' => $model->averageScore
            ],
            [
                'label' => 'Успеваемость, %',
                'value' => $model->academicPerfomance
            ],
            [
                'label' => 'Качество знаний, %',
                'value' => $model->quality
            ],
            /*'course',
            'groupName',
            'groupNumber',
            'teacherName',
            'subject',
            'allStudents',
            'completeStudents',
            'markFive',
            'markFour',
            'markThree',
            'markTwo',
            'averageScore',
            'academicPerfomance',
            'quality',*/
        ],
    ]) ?>

</div>
