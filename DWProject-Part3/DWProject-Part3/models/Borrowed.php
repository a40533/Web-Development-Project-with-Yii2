<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "borrowed".
 *
 * @property int $id
 * @property int $book_id
 * @property int $user_id
 * @property string|null $borrowed_date
 * @property string|null $borrowed_time
 * @property string|null $return_date
 *
 * @property Books $book
 * @property User $user
 */
class Borrowed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrowed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'user_id'], 'required'],
            [['book_id', 'user_id'], 'integer'],
            [['borrowed_date', 'borrowed_time', 'return_date'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['book_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'user_id' => 'User ID',
            'borrowed_date' => 'Borrowed Date',
            'borrowed_time' => 'Borrowed Time',
            'return_date' => 'Return Date',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Books::class, ['id' => 'book_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
