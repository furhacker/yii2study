<?php 
namespace app\controllers;
use yii\web\controller;
use app\models\Order;

class GaoxiaoController extends Controller {
	public function actionIndex() {
		/**
		 * 类的映射表机制
		 * 常用的类加入映射表, 不常用的不建议加入
		 */
		\YII::$classMap['app\models\Order'] = 'D:\www\yii2study\models\Order.php';
		$order = new Order();
	}

	/**
	 * 数据缓存之增删改查
	 */
	public function actionIndex1() {
		// 获取缓存组件
		$cache = \YII::$app->cache;

		// 往缓存中写入数据
		// $cache->add('key1', 'hello nihao!');
		// $cache->add('key1', 'hello nihao2!');	// 有了第一条(相同的key), 第二条就不会生效 

		// 删除数据
		$cache->delete('key1');

		// 清空数据
		$cache->flush();

		// 获取缓存中的数据/读取缓存
		$data = $cache->get('key1');

		print_r($data);
	}

	/**
	 * 缓存数据有效期设置
	 */
	public function actionIndex2() {
		// 获取缓存组件
		$cache = \YII::$app->cache;

		// 有效期设置
		// $cache->add('key', 'hello', 15); // 保存15秒

		echo $cache->get('key');
	}

	/**
	 * 数据缓存中依赖关系详解
	 */
	public function actionIndex3() {
		// 获取缓存组件
		$cache = \YII::$app->cache;

		/**
		 * 文件依赖
		 */
		// $dependency = new \yii\caching\FileDependency(['fileName'=>'hw.txt']);
		// $cache->add('file_key', 'hello world!', 3000, $denpendency);
		// var_dump($cache->get('file_key'));


		// 创建一个对 example.txt 文件修改时间的缓存依赖
		// $dependency = new \yii\caching\FileDependency(['fileName' => 'example.txt']);
		// $dependency = new \yii\caching\FileDependency(['fileName' => './hw.txt']);

		// 缓存数据将在30秒后超时
		// 如果 example.txt 被修改，它也可能被更早地置为失效状态。
		// $cache->set('key', 'nihao', 30, $dependency);

		// 缓存会检查数据是否已超时。
		// 它还会检查关联的依赖是否已变化。
		// 符合任何一个条件时都会返回 false。
		// echo $data = $cache->get('key');

		/**
		 * 表达式依赖
		 */
		$dependency = new \yii\caching\ExpressionDependency(
			['expression'=>'\YII::$app->request->get("name")']
		);
		$cache->add('expression_key', 'hello world!', 3000, $dependency);
		var_dump($cache->get('expression_key'));
	}
}