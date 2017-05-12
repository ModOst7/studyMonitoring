<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;

app\assets\ApplicationUiAssetBundle::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<?= Html::csrfMetaTags() ?>
	</head>
	<body>

		<?php $this->beginBody() ?>
		<div id="header">
			<!--<div class="authorization-indicator">
				<?php if (Yii::$app->user->isGuest): ?>
				    <?= Html::tag('span', 'guest'); ?>
				    <?= Html::a('login', '@web/site/login'); ?>
				<?php else: ?>
				    <?= Html::tag('span', Yii::$app->user->identity->username); ?>
				    <?= Html::a('logout', '@web/site/logout'); ?>
				<?php endif; ?>
			</div>-->
			<?php echo Nav::widget([
				'items' => [
				    [
				        'label' => 'Срезы',
				        'url' => ['/container/index'],
				    ],
				    [
				        'label' => 'Главная',
				        'url' => ['/site/index'],
				    ],
				    [
				        'label' => 'Статистика',
				        'url' => ['/statistic/index'],
				    ],
				    [
				        'label' => 'Графики',
				        'url' => ['/grafic/index'],
				    ],
				    Yii::$app->user->isGuest ?
				    [
				        'label' => 'Вход',
				        'url' => ['/site/login'],
				        'linkOptions' => ['class' => 'login']
				    ] : 
				    [
				        'label' => 'Выход('.Yii::$app->user->identity->username.')',
				        'url' => ['/site/logout'],
				        'linkOptions' => ['class' => 'logout']
				    ]
				],
				'options' => ['class' => 'nav-tabs']
			]); ?>
		</div>
		<div class="container">
		    <?= $content ?>
		    <div class="footer"><?= Yii::powered();?></div>
		</div>
		<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>