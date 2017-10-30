<?php

namespace frontend\models;

use common\models\User;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property integer $author
 * @property string $title
 * @property string $img
 * @property string $date_create
 * @property integer $coment_status
 * @property string $text
 *
 * @property User $author0
 */
class Blog extends \yii\db\ActiveRecord
{
    public $image;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'title', 'text'], 'required'],
            [['author', 'coment_status','count'], 'integer'],
            [['date_create'], 'safe'],
            [['text','preview'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['image'], 'file', 'extensions' => ['png', 'jpg']],

//            [['image'], 'string', 'max' => 255],
            [['date_create'], 'unique'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Автор',
            'title' => 'Заголовок',
            'image' => 'Превью (картинка)',
            'date_create' => 'Дата создания',
            'coment_status' => 'управление коментариями',
            'preview'=>'Превью',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['blog_id' => 'id']);
    }


    public function upload()
    {

        if ($this->validate()) {
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            unlink($path);
            return true;
        } else {
            return false;
        }
    }

}
