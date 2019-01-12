<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Books;
use app\models\AddBook;

class BooksController extends Controller
{
    // 添加一本书
    public function actionAdd()
    {
        $model = new AddBook();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...

            //使用books model添加数据
            $book = new Books();

            $book->name = $model->name;
            $book->author = $model->author;

            $book->save();

            return $this->redirect(array('/books/index'));
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('add', ['model' => $model]);
        }
    }

    // 修改一本书
    public function actionUpdate()
    {
        $id = Yii::$app->request->post('id');
        $name = Yii::$app->request->post('name');
        $author = Yii::$app->request->post('author');

        $updateBook = Books::find()->where(['id' => $id])->one();
        $updateBook->name = $name;
        $updateBook->author = $author;
        $updateBook->save();

        return $this->redirect(array('/books/index'));
    }

    // 删除一本书
    public function actionDelete($id)
    {
        // 查询是否有这本书
        $selectQuery = Books::find()->where(['id'=>$id])->one();

        $length = count($selectQuery);

        if ($length != 0) {
            $query = Books::findOne($id)->delete();

            return $this->render('delete');
        } else {
            return $this->redirect(array('/books/index'));
        }
    }
    
    // 查询书籍
    public function actionIndex()
    {
        $query = Books::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $books = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'books' => $books,
            'pagination' => $pagination,
        ]);
    }
}
