<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model frontend\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'author')->textInput(['value' => Yii::$app->user->id, 'type' => 'hidden',])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <!--    --><? //= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'coment_status')->dropDownList(['1' => 'Включить коментарии', '0' => 'Выключить коментарии']) ?>

    <?= $form->field($model, 'preview')->textarea(['rows' => 6]) ?>
    <?php
    echo $form->field($model, 'text')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',
            [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ]),
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
