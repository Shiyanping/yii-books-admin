<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>删除成功</h1>
<?= Html::button('返回首页', ['class' => 'btn btn-primary', 'onclick' => 'location.href = "?r=books/index"']) ?>