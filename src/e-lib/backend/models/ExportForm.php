<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 20:07
 */

namespace backend\models;


use yii\base\Model;

class ExportForm extends Model
{
    public $name;
    public $author_name;
    public $pages;
    public $year;
    public $publisher;

    public function attributeLabels()
    {
        return [
            'name'=>'Название',
            'author_name'=>'ФИО автора',
            'pages'=>'Количество страниц',
            'year'=>'Год выпуска',
            'publisher'=>'Издатель'
        ];
    }
}