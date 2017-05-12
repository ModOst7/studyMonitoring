<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'container_id',
            'course',
            'groupName',
            'groupNumber',
            // 'teacherName',
            // 'subject',
            // 'allStudents',
            // 'completeStudents',
            // 'markFive',
            // 'markFour',
            // 'markThree',
            // 'markTwo',
            // 'averageScore',
            // 'academicPerfomance',
            // 'quality',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
