<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $birth
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'birth'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'birth' => 'Birth',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function cleanDelete(){
        foreach ($this->books as $book){
            $book->delete();
        }
        $this->delete();
        return true;
    }

    public function getName(){
        return $this->name.' '.$this->surname;
    }

    public function getFullName(){
        return $this->surname.' '.$this->name.' '.$this->patronymic;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['author_id' => 'id']);
    }
}
