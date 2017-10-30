<?php


namespace frontend\controllers;

use Yii;
use frontend\models\Blog;
use frontend\models\Comments;
use yii\web\Controller;

class PublicationController extends Controller
{
    public function actionView($id)
    {

        $publication = Blog::findOne($id);
        $comments = Comments::find()->with('user')->where(['blog_id' => $id])->all();
        $comment = new Comments();
        $sum = Comments::find()->where(['blog_id'=>$id])->count();
        $publication->count=$sum;
        $publication->save();
        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {

            return $this->refresh();
        }

        return $this->render('view', [
            'publications' => $publication,
            'comments' => $comments,
            'comment' => $comment,
            'sum'=>$sum
        ]);
    }
}
