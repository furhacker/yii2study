<?php
namespace app\models;
use yii\db\ActiveRecord;

class Customer extends ActiveRecord {

	public function getOrders() {
		$orders = $this->hasMany(Order::className(), ['customer_id'=>'id'])->asArray()->all();
		// $orders = $this->hasMany(Order::className(), ['customer_id'=>'id'])->asArray();

		return $orders;
	}
}