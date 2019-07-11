<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 17:29
 */

namespace backend\controllers;

use backend\models\BookForm;
use common\models\Author;
use common\models\Book;
use Yii;
use yii\web\Controller;

class BookController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login')->send();
        }
        return true;
    }

    public function actionIndex(){
        $books=Book::find()->with('author')->all();
        return $this->render('index',[
            'books'=>$books
        ]);
    }

    public function actionCreate(){
        $model=new BookForm();
        if($model->load(Yii::$app->request->post()) && $model->create()){
            return $this->redirect('/book/index')->send();
        }
        return $this->render('create',[
            'model'=>$model
        ]);
    }

    public function actionEdit($id){
        $model=new BookForm($id);
        $authors=Author::find()->all();
        if($model->load(Yii::$app->request->post()) && $model->edit($id)){
            return $this->redirect('/book/index')->send();
        }
        return $this->render('edit',[
            'model'=>$model,
            'authors'=>$authors
        ]);
    }

    public function actionDetail($id){
        $book=Book::find()->where(['id'=>$id])->with('author')->one();
        return $this->render('detail',[
            'book'=>$book
        ]);
    }

    public function actionDelete($id){
        $book=Book::find()->where(['id'=>$id])->one();
        if($book){
            $book->delete();
            return true;
        }
        return false;
    }
}