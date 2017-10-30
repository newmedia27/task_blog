<?php


namespace frontend\controllers;



use frontend\models\Blog;
use frontend\models\Comments;
use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex($id)
    {

        $publications = Blog::find()->where(['author'=>$id])->all();


        return $this->render('index', ['publications'=>$publications,'sum'=>$sum]);
    }


}