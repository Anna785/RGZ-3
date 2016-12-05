<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic_name
 * @property string $date_of_birth
 *
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'patronymic_name', 'date_of_birth'], 'required', 'message'=> 'Поле обязательно для заполнения'],
            [['date_of_birth'], 'date', 'format'=>'dd-mm-yy', 'message'=> 'Формат даты введен не верно'],
			[['date_of_birth'], 'safe'],
            [['first_name', 'last_name', 'patronymic_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic_name' => 'Отчество',
            'date_of_birth' => 'Дата рождения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['author_id' => 'id']);
    }
}
