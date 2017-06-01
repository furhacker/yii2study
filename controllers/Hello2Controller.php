<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Test;
use app\models\Customer;
use app\models\Order;

class Hello2Controller extends Controller {
	// 数据模型 之 关联查询
	public function actionIndex() {
		// 根据顾客查询 他的订单信息
		// $res = Customer::find()->where(['name'=>'zhangsan'])->asArray()->all(); // 返回二维数组
		// $res = Customer::find()->where(['name'=>'zhangsan'])->asArray()->one(); // 返回二维数组

		
		// $customer = Customer::find()->where(['name'=>'zhangsan'])->one();	// 返回一维数组

		// $orders = $customer->hasMany('app\models\Order', ['customer_id'=>'id'])->asArray()->all();	// hasMany() 方法只能用在 对象 上
		// $orders = $customer->hasMany(Order::className(), ['customer_id'=>'id'])->asArray()->all();
		// $orders = $customer->getOrders(); // 调用模型里的 封装方法
		// $orders = $customer->orders; // __get() 方法 对get和orders进行拼接, 即getOrders()方法, 再自动补上all()方法, 所以模型里的all()方法要去掉(实验证明, 不去掉也行!!!)
		// var_dump($orders);


		// 根据订单查询客户信息
		$order = Order::find()->where(['id'=>1])->one();
		$customer = $order->customer;	// getCustomer() + one()
		var_dump($customer);
	}


	// 数据模型 之 关联查询 性能问题
	public function actionIndex2() {

		// 1. 关联查询结果缓存
		$customer = Customer::find()->where(['name'=>'zhangsan'])->one();
		$orders = $customer->orders; // select * from order where customer_id = ...
		unset($customer_orders); // 完善优化
		$otders2 = $customer->orders; // select * from order where customer_id = ...



		// 2. 关联查询的多次查询
		/*$customers = Customer::find()->all();	// select * from customer;
		foreach ($customers as $customer) {
			$orders = $customer->orders;	// select * from order where customer_id = ...
		}*/

		// 完善优化:
		// select * from customer;
		// select * from order where customer_id in(...)
		$customers = Customer::find()->with('orders')->all();	
		foreach ($customers as $customer) {
			$orders = $customer->orders;	
		}
	}


}