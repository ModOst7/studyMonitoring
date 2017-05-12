<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\test\Specialty;

/* @var $this yii\web\View */
/* @var $model app\models\test\Container */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Containers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-view">

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
            [
                'label' => 'Год',
                'value' => $model->year
            ],
            [
                'label' => 'Месяц',
                'value' => function($model){
                    switch ($model->month) {
                        case '1':
                            return 'Январь';
                            break;
                        case '2':
                            return 'Февраль';
                            break;
                        case '3':
                            return 'Март';
                            break;
                        case '4':
                            return 'Апрель';
                            break;
                        case '5':
                            return 'Май';
                            break;
                        case '6':
                            return 'Июнь';
                            break;
                        case '7':
                            return 'Июль';
                            break;
                        case '8':
                            return 'Август';
                            break;
                        case '9':
                            return 'Сентябрь';
                            break;
                        case '10':
                            return 'Октябрь';
                            break;
                        case '11':
                            return 'Ноябрь';
                            break;
                        case '12':
                            return 'Декабрь';
                            break;
                        
                        default:
                            return 'Январь';
                            break;
                    }
                }
            ],
            'id',
        ],
    ]) ?>

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
                ]
            ]
        ]);?>

</div>
