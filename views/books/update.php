<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<ul>
<?php foreach ($book as $bookItem): ?>
    <li>
        <?= $bookItem->id ?>:
        <span><?= Html::encode("{$bookItem->name}") ?></span>
        (<span><?= Html::encode("{$bookItem->author}") ?></span>)
        <?= Html::a('修改', '#', [
            'id' => 'create',
            'data-toggle' => 'modal',
            'data-target' => '#create-modal',
            'class' => 'btn btn-success',
            'data-id' => "{$bookItem->id}"
        ])?>
        <!-- <a href="?r=books/update&id=<?= Html::encode("{$bookItem->id}") ?>">修改</a> -->
        <a href="?r=books/delete&id=<?= Html::encode("{$bookItem->id}") ?>" class="btn btn-danger">删除</a>
    </li>
<?php endforeach; ?>
</ul>
<?= Html::button('返回首页', ['class' => 'btn btn-primary', 'onclick' => 'location.href = "?r=books/index"']) ?>
