<?php
namespace app\assets;

use yii\web\AssetBundle;

class WebixAssetBundle extends AssetBundle
{
	public $sourcePath = '@app/assets/webix';
	public $css = [
	'webix.css'
	];
	public $js = [
	'webix.js'
	];
	public $depends = [

	];
}