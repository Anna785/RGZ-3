<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $genre
 * @property integer $author_id
 * @property string $publishing_house
 * @property string $year_of_publishing
 * @property integer $status
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'genre', 'author_id', 'publishing_house', 'year_of_publishing'], 'required', 'message'=> 'Поле обязательно для заполнения'],
            [['author_id', 'status', 'year_of_publishing'], 'integer','message'=> 'Формат введен неверно'],
            [['year_of_publishing'], 'safe' ],
            [['name', 'genre', 'publishing_house'], 'string', 'max' => 200],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'genre' => 'Жанр',
            'author_id' => 'Автор',
            'publishing_house' => 'Издательство',
            'year_of_publishing' => 'Год издания',
            'status' => 'Наличие',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}
