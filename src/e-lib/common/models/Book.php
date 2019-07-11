<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property int $pages
 * @property int $year
 * @property string $publisher
 * @property int $cover
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Author $author
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
            [['author_id', 'pages', 'year', 'cover', 'created_at', 'updated_at'], 'integer'],
            [['name', 'publisher'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'name' => 'Name',
            'pages' => 'Pages',
            'year' => 'Year',
            'publisher' => 'Publisher',
            'cover' => 'Cover',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCover(){
        switch ($this->cover) {
            case 1:
                return 'Мягкая';
                break;
            case 2:
                return 'Твердая';
            default:
                return 'Неизвестно';
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}
