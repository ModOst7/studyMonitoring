<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
app\assets\WebixAssetBundle::register($this);
$this->registerCss(".hidden {display:block !important;}");
$this->title = 'Графики успеваемости';
?>

<h1>Графики успеваемости</h1>
<?php $this->registerJsFile('web/assets/singleAssets/go.js', ['depends' => '\yii\web\JqueryAsset']); ?>
<?= Html::button('Построить', ['id' => 'go', 'class' => 'btn btn-success']); ?>
<div id="chartDiv" style="width:98%;height:600px;margin:20px"></div>