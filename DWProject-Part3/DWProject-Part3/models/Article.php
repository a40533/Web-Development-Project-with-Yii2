<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "article".
 *
 * @property int $ID
 * @property string $Title
 * @property string $slug
 * @property string $Body
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 *
 * @property User $createdBy
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    public function behaviors() 
   { 
       return [ 
           TimestampBehavior::class, 
           [ 
               'class'=>BlameableBehavior::class, 
               'updatedByAttribute'=>false 
           ],
           [
               'class'=>SluggableBehavior::class,
               'attribute'=>'Title'
           ]
       ]; 
   } 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Title', 'Body'], 'required'],
            [['created_at', 'created_by', 'updated_at'], 'integer'],
            [['Title', 'slug'], 'string', 'max' => 1024],
            [['Body'], 'string', 'max' => 2048],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Title' => 'Title',
            'slug' => 'Slug',
            'Body' => 'Body',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getEncodedBody()
    {
        return Html::encode($this->Body);
    }
}
