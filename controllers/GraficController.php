<?php

namespace app\controllers;
use yii\filters\AccessControl;

class GraficController extends \yii\web\Controller 
{
	public function behaviors()
        {
            return [
                'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'roles' => ['admin'],
                        'allow' => true
                    ]
                ]
            ]
            ];
        }

	public function actionIndex()
	{
		return $this->render('index');
	}
}