<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 19:34
 */

namespace backend\models;

use common\models\Book;
use moonland\phpexcel\Excel;
use yii\base\Model;
use Yii;

class ExcelModel extends Model
{
    public static function export(){
        /**
         * @var Book[] $books
         */
        $books=Book::find()->with('author')->all();
        $models=[];
        foreach ($books as $book){
            $form=new ExportForm();
            $form->name=$book->name;
            $form->year=$book->year;
            $form->publisher=$book->publisher;
            $form->pages=$book->pages;
            $form->author_name=$book->author->getFullName();
            array_push($models,$form);
        }
        Excel::widget([
            'models' => $models,
            'mode' => 'export',
            'headers' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'],
            'fileName'=>Yii::$app->params['excelFile'],
            'asAttachment'=>true
        ]);
    }
}