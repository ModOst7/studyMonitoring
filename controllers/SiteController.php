<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\user\LoginForm;

class SiteController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionLogin()
	{
		if (!\Yii::$app->user->isGuest)
			return $this->goHome();

		$model = new LoginForm();
		if ($model->load(\Yii::$app->request->post()) and $model->login())
			return $this->goBack();

		return $this->render('login', compact('model'));
	}

	public function actionLogout()
	{
		\Yii::$app->user->logout();
		return $this->goHome();
	}
}