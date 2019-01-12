<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;

?>
<h1>我喜欢的图书：</h1>
<ul>
<?php foreach ($books as $bookItem): ?>
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

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<div>
<?= Html::button('添加图书', ['class' => 'btn btn-primary', 'onclick' => 'location.href = "?r=books/add"']) ?>
</div>

<?php
 Modal::begin([
    'id' => 'create-modal',
    'header' => '<h4 class="modal-title">修改</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal" id="update-book">确认</a><a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
]);

//弹窗的html内容，下面的 js 会调用获得该页面的 Html内容，直接填充在弹框中
$requestUrl = Url::toRoute('/books/update');
$js = <<<JS
    let id = '';
    $(document).on('click', '#create', function () {
        id = $(this).data('id');
        const author = $(this).prev().text();
        const name = $(this).prev().prev().text();
        $('.modal-body').html('<p>id: '+id+'</p><p>书名: <input type="text" id="book-name" value="'+name+'"></p><p>作者: <input type="text" id="book-author" value="'+author+'"></p>');
    });

    $(document).on('click', '#update-book', function() {
        const author = $('#book-author').val();
        const name = $('#book-name').val();
        $.post('{$requestUrl}', {
            id: id,
            name: name,
            author: author
        }, function(res) {
            console.log(res);
        })
    });
JS;
$this->registerJs($js);
Modal::end();
?>

