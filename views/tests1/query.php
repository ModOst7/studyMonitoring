<?php

use yii\helpers\Html;

echo Html::beginForm(['/tests'], 'get');
echo Html::label('Курс:', 'course');
echo Html::textInput('course');
echo Html::submitButton('Поиск');
echo Html::endForm();