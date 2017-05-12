<?php

echo \yii\widgets\ListView::widget(
	[
	    'options' => [
	        'class' => 'list-view',
	        'id' => 'search_results'
	    ],
	    'itemView' => '_test',
	    'dataProvider' => $records
	]
);