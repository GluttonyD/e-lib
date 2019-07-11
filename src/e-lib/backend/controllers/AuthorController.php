<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 16:59
 */

namespace backend\controllers;


use backend\models\AuthorForm;
use common\models\Author;
use yii\web\Controller;
use Yii;

class AuthorController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login')->send();
        }
        return true;
    }

    public function actionIndex(){
        $authors=Author::find();
        if(Yii::$app->request->isAjax){
            return json_encode($authors->asArray()->all());
        }
        $authors=$authors->all();
        return $this->render('index',[
           'authors'=>$authors
        ]);
    }

    public function actionCreate(){
        $model=new AuthorForm();
        if($model->load(Yii::$app->request->post())&& $model->create()){
            return $this->redirect('/author/index')->send();
        }
        return $this->render('create',[
            'model'=>$model
        ]);
    }

    public function actionEdit($id){
        $model=new AuthorForm($id);
        if($model->load(Yii::$app->request->post())&& $model->edit($id)){
            return $this->redirect('/author/index')->send();
        }
        return $this->render('edit',[
            'model'=>$model
        ]);
    }

    public function actionDelete($id){
        /**
         * @var Author $author
         */
        $author=Author::find()->where(['id'=>$id])->one();
        if($author){
            return $author->cleanDelete();
        }
        return false;
    }

}