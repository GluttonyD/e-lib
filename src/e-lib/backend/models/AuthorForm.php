<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 17:03
 */

namespace backend\models;


use yii\base\Model;
use common\models\Author;

class AuthorForm extends Model
{
    public $name;
    public $surname;
    public $patronymic;
    public $birth;

    public function __construct($id=null)
    {
        parent::__construct();
        if($id){
            $author=Author::find()->where(['id'=>$id])->asArray()->one();
            $this->setAttributes($author);
        }
    }

    public function rules()
    {
        return [
            [['name','surname','patronymic','birth'],'required'],
            [['name','surname','patronymic','birth'],'string']
        ];
    }

    public function create(){
        if($this->validate()){
            $author=new Author();
            $author->name=$this->name;
            $author->surname=$this->surname;
            $author->patronymic=$this->patronymic;
            $author->birth=$this->birth;
            $author->created_at=time();
            $author->updated_at=time();
            $author->save();
            return $author->id;
        }
        return false;
    }

    public function edit($id){
        if($this->validate()){
            /**
             * @var Author $author
             */
            $author=Author::find()->where(['id'=>$id])->one();
            $author->name=$this->name;
            $author->surname=$this->surname;
            $author->patronymic=$this->patronymic;
            $author->updated_at=time();
            $author->save();
            return $author->id;
        }
        return false;
    }
}