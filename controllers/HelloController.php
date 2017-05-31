<?php
namespace app\controllers;
use yii\web\Controller;
use yii\web\Cookie;

class HelloController extends Controller{
	public function actionIndex() {
		//   \YII::   全局类
		//	 $app     应用主体

		/***********Yii框架控制器之请求处理 start **************/
		//$request = \YII::$app->request; // 请求组件
		//echo $request->get('id'); // 获取参数ID的值
		//echo $request->get('id', 20); // 添加默认值
		// post 同理...

		// 判断提交方式
		/*if ($request->isGet) {
			echo 'get 方法';
		}
		if ($request->isPost) {
			echo 'get 方法';
		}*/

		// 获取用户IP
		//echo $request->userIp;
		/***********Yii框架控制器之请求处理 end **************/


		/***********Yii框架控制器之响应处理 start **************/
		// $res = \YII::$app->response;

		// $res->statusCode = '404';	// 设置状态码

		// $res->headers->add('pragma', 'no-cache');	// 设置header , 添加参数pragma , 不缓存

		// $res->headers->set('pragma', 'max-age=5');	// 设置header , 把接收到的消息缓存5秒钟

		// $res->headers->remove('pragma');	// 删除pragma参数

		// 跳转
		// $res->headers->add('location', 'http://www.baidu.com');	// 添加header跳转  为什么不管用???

		// Yii对跳转进行了包装
		// $this->redirect('http://www.baidu.com');
		// $this->redirect('http://www.baidu.com', 302);

		// 文件下载
		// $res->headers->add('content-disposition, 'attchment; filename="a.jpg"'); // 文件下载(不管用)
		// $res->sendFile('./robots.txt'); // 在入口脚本处寻找, 文件必须存在,不然报错
		/***********Yii框架控制器之响应处理 end **************/


		/***********Yii框架控制器之session处理 start **************/
		/*
		$session = \YII::$app->session;

		// 判断session是否开启
		if ($session->isActive) {
			echo 'session 已经开启';
		} else {
			$session->open(); // 开启session
		}

		$session->set('user', '周一晚');	// 设置
		echo $session->get('user');	// 获取
		$session->remove('user');	// 删除

		$session['user'] = '张三';	// 设置
		echo $session['user'];	// 获取
		unset($session['user']);	// 删除
		// 应用了PHP的 ArrayAccess 接口(当做数组来使用)
		*/
		/***********Yii框架控制器之session处理 end **************/

		/***********Yii框架控制器之cookie处理 start **************/
		// 需添加 use yii\web\Cookie;
		/*$cookies = \YII::$app->response->cookies;	// cookies集合

		$cookie_data = array('name'=>'user', 'value'=>'张三');
		$cookies->add(new Cookie($cookie_data));
		$cookies->remove('id');*/

		/*$res = YII::$app->request->cookies;
		echo $cookies->getValue('user');	// 请求组件获取cookie值
		echo $cookies->getValue('user', 20);	// 获取不存在的参数,返回默认值*/
		/***********Yii框架控制器之cookie处理 end **************/
	}

	public function actionIndex2() {
		// return $this->renderPartial('index'); // 省略后缀.php

		$hello_str = 'hello God !';
		$test_arr = array(666, 888);

		$data = array();
		$data['view_hello_str'] = $hello_str;
		$data['view_test_arr'] = $test_arr;


		
		/******************视图之数据安全****************/
		$data['str'] = '<script>alert(123);</script>';
		/******************视图之数据安全****************/

		return $this->renderPartial('index', $data);
	}

	public $layout = 'common';	// 显示common布局文件
	public function actionIndex3() {
		// return $this->render('about2');	// $content
		return $this->render('about1');	// $content
	}
}

