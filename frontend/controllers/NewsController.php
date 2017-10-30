<?php


namespace frontend\controllers;

use common\models\User;
use frontend\models\Blog;
use frontend\models\Comments;
use yii\web\Controller;

class NewsController extends Controller
{
    public function actionList()
    {
        $publications = Blog::find()->with('user')->orderBy(['date_create'=>SORT_DESC])->all();

        return $this->render('index',[
            'publications'=>$publications,
            'sum'=>$sum
            ]);
    }

}