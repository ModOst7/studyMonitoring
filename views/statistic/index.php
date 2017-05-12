<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
use app\models\test\Specialty;
$this->title = 'Статистика';
?>
<h1>Статистика</h1>

    <?php  $form = ActiveForm::begin([
        'method' => 'get',
        'action' => Url::to('index')
        ]); ?>
    <?= $form->field($container, 'year')->textInput(['placeholder' => '2017'], ['class' => 'form-control'])->label('Год') ?>
    <?= $form->field($container, 'month')->dropDownList([
        '1' => 'Январь',
        '2' => 'Февраль',
        '3' => 'Март',
        '4' => 'Апрель',
        '5' => 'Май',
        '6' => 'Июнь',
        '7' => 'Июль',
        '8' => 'Август',
        '9' => 'Сентябрь',
        '10' => 'Октябрь',
        '11' => 'Ноябрь',
        '12' => 'Декабрь'
        ],

        ['class' => 'form-control'])->label('Месяц') ?>
    <?= Html::submitButton('поиск', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>

    <?php if (isset($error)): ?>
        <h1>Ничего не найдено.</h1>
    <?php endif ?>

    <?php if (isset($arrCourses)): ?>
        <?php $courseProvider = new ArrayDataProvider([
            'allModels'=> $arrCourses,
            'pagination' => false
            ]); ?>

        <h2>Результаты по курсам</h2>
        <?= GridView::widget([
            'dataProvider' => $courseProvider,
            'columns' => [
                [
                'attribute' => 'course',
                'label' => 'Курс',
                'value' => 'course'
                ],
                [
                'attribute' => 'averageScore',
                'label' => 'Средний балл',
                'value' => function($model) {return $model['averageScore'];}
                ],
                [
                'attribute' => 'academicPerfomance',
                'label' => 'Успеваемость',
                'value' => function($model) {return $model['academicPerfomance'].'%';}
                ],
                [
                'attribute' => 'quality',
                'label' => 'Качество знаний',
                'value' => function($model) {return $model['quality'].'%';}
                ],
            ]
            ]) ?>
        <?php $courseDocForm = ActiveForm::begin(['method' => 'post', 'action' => 'formdoc', 'options' => ['target' => '_blank']]); ?>
            <?= $courseDocForm->field($container, 'year', ['options' => ['hidden' => 'true']])->textInput(['value' => $container->year]); ?>
            <?= $courseDocForm->field($container, 'month', ['options' => ['hidden' => 'true']])->textInput(['value' => $container->month]); ?>
            <?= Html::submitButton('Скачать в формате doc', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    <?php endif ?>

    <?php if (isset($arrGroupes)): ?>
        <?php $groupProvider = new ArrayDataProvider([
            'allModels'=> $arrGroupes,
            'pagination' => false
            ]); ?>

        <h2>Результаты по специальностям</h2>
        
        <?= GridView::widget([
            'dataProvider' => $groupProvider,
            'columns' => [
                [
                'attribute' => 'groupName',
                'label' => 'Специальность',
                'value' => 'groupName'
                ],
                [
                'attribute' => 'averageScore',
                'label' => 'Средний балл',
                'value' => function($model) {return $model['averageScore'].'%';}
                ],
                [
                'attribute' => 'academicPerfomance',
                'label' => 'Успеваемость',
                'value' => function($model) {return $model['academicPerfomance'].'%';}
                ],
                [
                'attribute' => 'quality',
                'label' => 'Качество знаний',
                'value' => function($model) {return $model['quality'].'%';}
                ],
            ]
            ]) ?>
        
    <?php endif ?>

    <?php if (isset($tests)): ?>
        <h2>Результаты по группам</h2>
        <?php Pjax::begin(['id' => 'w4', 'enablePushState' => false, 'timeout' => false, 'clientOptions' => ['method' => 'POST']]); ?>
        <?= GridView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
            	'query' => $tests,
            	'pagination' => false
            	]),
            'columns' => [
                [
                    'attribute' => 'groupName',
                    'label' => 'Группа',
                    'value' => function($model) { 
                        $spec = Specialty::findOne(['id' => $model->specialty_id]);
                        return $spec->name."-".$model->groupNumber;},
                ],
                [
                    'attribute' => 'averageScore',
                    'value' => 'averageScore',
                    'label' => 'Средний балл'
                ],
                [
                    'attribute' => 'academicPerfomance',
                    'value' => function($model) { return $model->academicPerfomance.'%';},
                    'label' => 'Успеваемость'
                ],
                [
                    'attribute' => 'quality',
                    'value' => function($model) { return $model->quality.'%';},
                    'label' => 'Качество знаний'
                ]
                ]
            ]); ?>
        <?php Pjax::end(); ?>
    <?php endif; ?>

</p>
