<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $usr_id
 * @property integer $blog_id
 * @property string $comments
 * @property string $date_create
 * @property integer $level
 *
 * @property Blog $blog
 * @property User $usr
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usr_id', 'blog_id', 'comments'], 'required'],
            [['usr_id', 'blog_id', 'level'], 'integer'],
            [['comments'], 'string'],
            [['date_create'], 'safe'],
            [['date_create'], 'unique'],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blog_id' => 'id']],
            [['usr_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usr_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usr_id' => 'Usr ID',
            'blog_id' => 'Blog ID',
            'comments' => 'Comments',
            'date_create' => 'Date Create',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'usr_id']);
    }
}
