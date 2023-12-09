<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $genre
 * @property int $genre_id
 * @property string $book_name
 * @property string $author_name
 * @property int $publication_date
 *
 * @property Borrowed[] $borroweds
 * @property Genre $genre0
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre', 'genre_id', 'book_name', 'author_name', 'publication_date'], 'required'],
            [['genre_id', 'publication_date'], 'integer'],
            [['genre', 'author_name'], 'string', 'max' => 255],
            [['book_name'], 'string', 'max' => 45],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre' => 'Genre',
            'genre_id' => 'Genre ID',
            'book_name' => 'Book Name',
            'author_name' => 'Author Name',
            'publication_date' => 'Publication Date',
        ];
    }

    /**
     * Gets query for [[Borroweds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorroweds()
    {
        return $this->hasMany(Borrowed::class, ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Genre0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre0()
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }
}
