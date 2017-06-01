<?php
namespace app\models;
use yii\db\ActiveRecord;

class Test extends ActiveRecord {

	public function actionIndex() {
		

	}

	// 对提交数据进行验证
	// 使用验证器, 每个验证器都是一个类
	public function rules() {
		return [
			['id', 'integer'],	// 是否是整形
			['title', 'string', 'length'=>[0,15]],	// 是否是字符串, 长度0~5

		];
	}
}