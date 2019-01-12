<?php

namespace app\models;

use yii\base\Model;

class AddBook extends Model
{
    public $name;
    public $author;

    public function rules()
    {
        return [
            [['name', 'author'], 'required']
        ];
    }
}
