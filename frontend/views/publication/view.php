<?php $img = $publications->getImage(); ?>
    <a href="<?= \yii\helpers\Url::to(['entry/index', 'id' => Yii::$app->user->id]) ?>">управление блогом</a>


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <ul>

                <li><?= date('H:i:s d-m-y', strtotime($publications['date_create'])); ?></li>
                <li><?= $publications['user']['username']; ?></li>
            </ul>

            <h3><?= $publications['title'] ?></h3>
            <div class="preview"><img src="<?= $img->getURL() ?>" alt=""></div>
            <p><?= $publications['preview'] ?></p>
            <p><?= $publications['text'] ?></p>
            <p><b>Коментарии: </b><?= $sum ?> </p>


        </div>
        <hr>

    </div>
</div>

<?php foreach ($comments as $comment): ?>
    <div class="container" id="redirect">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><?= date('H:i:s d-m-y', strtotime($comment['date_create'])) ?></li>

                    <li ><?= $comment['user']['username'] ?></li>
                </ul>

                <div ><p><?= $comment['comments'] ?></p></div>
                <hr>

            </div>
        </div>
    </div>
    <hr><br>
<?php endforeach; ?>
<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

if (!Yii::$app->user->isGuest):?>
    <?php if ($publications['coment_status'] === 1): ?>

        <?= $this->render('_form', [
            'model' => $comment,
            'publication' => $publications,
        ]) ?>
    <?php endif; ?>
<?php endif; ?>