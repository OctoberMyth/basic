<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabl_article".
 *
 * @property string $id
 * @property string $title
 * @property resource $content
 * @property string $author
 * @property string $time
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabl_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['id'], 'string', 'max' => 32],
            [['title', 'author'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'author' => 'Author',
            'time' => 'Time',
        ];
    }

}
