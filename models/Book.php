<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $author
 * @property string $time
 * @property int $library_id
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'author', 'time'], 'required'],
            [['time'], 'safe'],
            [['library_id'], 'integer'],
            [['name'], 'string', 'max' => 52],
            [['author'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '书名',
            'author' => '作者',
            'time' => '创建时间',
            'library_id' => '藏书馆',
        ];
    }
}
