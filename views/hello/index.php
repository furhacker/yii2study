<?php 
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>hello world !!</h1>
<h1> <?=$view_hello_str;?> </h1>
<h1> <?=$view_test_arr[0];?> </h1>


<h1> <?=Html::encode($str);?> ---->>>>原样展示js </h1>
<h1> <?=HtmlPurifier::process($str);?> ---->>>完全过滤js代码 </h1>

</body>
</html>