<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\test\Specialty;

/* @var $this yii\web\View */
/* @var $model app\models\test\Container */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'year')->textInput()->label('Год'); ?>

    <?= $form->field($model, 'month')->dropDownList([
    	'1' => 'Январь',
    	'2' => 'Февраль',
    	'3' => 'Март',
    	'4' => 'Апрель',
    	'5' => 'Май',
    	'6' => 'Июнь',
    	'7' => 'Июль',
    	'8' => 'Август',
    	'9' => 'Сентябрь',
    	'10' => 'Окрябрь',
    	'11' => 'Ноябрь',
    	'12' => 'Декабрь',
    ],
    [
        'prompt' => 'Выберите месяц'
    ])->label('Месяц'); ?>

    <?php if (!$model->isNewRecord):?>
        <h2>Контрольные срезы</h2>
        <?= \yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getTests(),
                'pagination' => false
            ]),
            'columns' => [
                [
                    'label' => 'Курс',
                    'attribute' => 'course',
                    'value' => 'course'
                ],
                [
                    'label' => 'Номер группы',
                    'attribute' => 'groupNumber',
                    'value' => 'groupNumber'
                ],
                [
                    'label' => 'Специальность',
                    'attribute' => 'specialty_id',
                    'value' => function($model){ return Specialty::findOne(['id' => $model->specialty_id])->name;}
                ],
                [
                    'class' => \yii\grid\ActionColumn::className(),
                    'controller' => 'tests',
                    'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Добавить', ['tests/create', 'relation_id' => $model->id])
                ]
            ]
        ]);?>
    <?php endif ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
