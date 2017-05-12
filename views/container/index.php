<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\test\ContainerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Записи о проведенных срезах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'year',
                'label' => 'Год',
                'value' => 'year'
            ],
            [
                'attribute' => 'month',
                'label' => 'Месяц',
                'value' => function($searchModel){
                    switch ($searchModel->month) {
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
