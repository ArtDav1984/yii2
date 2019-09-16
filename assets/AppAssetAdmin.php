<?php
	/**
	 * Created by PhpStorm.
	 * User: User
	 * Date: 16.09.2019
	 * Time: 12:13
	 */
	
	namespace app\assets;
	
	use yii\web\AssetBundle;
	
	/**
	 * Main application asset bundle.
	 *
	 * @author Qiang Xue <qiang.xue@gmail.com>
	 * @since 2.0
	 */
	class AppAssetAdmin extends AssetBundle
	{
		public $basePath = '@webroot';
		public $baseUrl = '@web';
		public $css = [
			'css/admin.css',
			'css/font-awesome.min.css',
		];
		public $js = [
			'js/admin.js'
		];
		public $depends = [
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapAsset',
		];
	}