<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 11.07.2019
 * Time: 17:31
 */

namespace backend\models;


use common\models\Author;
use common\models\Book;
use yii\base\Model;

class BookForm extends Model
{
    public $name;
    public $pages;
    public $year;
    public $publisher;
    public $cover;
    public $author_id;
    public $author_data;

    /**
     * @var Book
     */
    private $_book;

    public function __construct($id=null)
    {
        parent::__construct();
        if($id){
            $this->_book=Book::find()->where(['id'=>$id])->asArray()->one();
            $this->setAttributes($this->_book);
        }
    }

    public function rules()
    {
        return [
            [['name'],'required'],
            [['name','publisher'],'string'],
            [['pages','year','cover','author_id'],'integer'],
            ['author_id','validateAuthor'],
            ['author_data','safe']
        ];
    }

    public function validateAuthor($attribute,$params){
        $author=Author::find()->where(['id'=>$this->author_id])->count();
        if(!$author){
            $this->addError($attribute,'Такого автора нет');
        }
    }

    public function create(){
        if($this->validate()){
            $book=new Book();
            $book->name=$this->name;
            $book->year=$this->year;
            $book->pages=$this->pages;
            $book->author_id=$this->setAuthor();
            $book->cover=$this->cover;
            $book->publisher=$this->publisher;
            $book->created_at=time();
            $book->updated_at=time();
            $book->save();
            return true;
        }
        return false;
    }

    public function edit($id){
        if($this->validate()){
            /**
             * @var Book $book
             */
            $book=Book::find()->where(['id'=>$id])->one();
            $book->name=$this->name;
            $book->year=$this->year;
            $book->pages=$this->pages;
            $book->author_id=$this->setAuthor();
            $book->cover=$this->cover;
            $book->publisher=$this->publisher;
            $book->updated_at=time();
            $book->save();
            return true;
        }
        return false;
    }

    public function setAuthor(){
        if($this->author_id){
            return $this->author_id;
        }
        $author=new AuthorForm();
        $author->setAttributes($this->author_data);
        if($author->validate()) {
            return $author->create();
        }
    }

    public function getBookID(){
        if($this->_book){
            return $this->_book['id'];
        }
        return false;
    }
}