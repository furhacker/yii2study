<?php
namespace app\models;
use yii\db\ActiveRecord;

class Order extends ActiveRecord {

	// 根据订单查询客户信息
	public function getCustomer() {
		return $this->hasOne(Customer::className(), ['id'=>'customer_id'])->asArray();
	}

}