<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="container">
    <div class="row">

        <div class="comments-form col-md-4">

            <?php $form = ActiveForm::begin(['id' => 'form-data']); ?>

            <?= $form->field($model, 'usr_id')->textInput(['class' => 'input-user', 'value' => Yii::$app->user->id, 'type' => 'hidden',])->label(false) ?>
            <?= $form->field($model, 'blog_id')->textInput(['class' => 'input-blog', 'value' => $publication['id'],'type' => 'hidden',])->label(false) ?>
            <?= $form->field($model, 'comments')->textarea(['rows' => 12, 'class' => 'form-control','value'=>'']) ?>

            <div class="form-group">
                <?= Html::submitButton('Коментировать', ['class' => 'btn btn-success', 'id' => 'id']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
