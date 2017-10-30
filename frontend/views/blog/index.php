<?php
//
//echo '<pre>';
//print_r($publications);die;
?>


    <a href="<?= \yii\helpers\Url::to(['entry/index', 'id' => Yii::$app->user->id]) ?>">управление блогом</a>

<?php foreach ($publications as $publication):


    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul>

                    <li><?= date('H:i:s d-m-y', strtotime($publication['date_create'])); ?></li>
                    <li><?= $publication['user']['username']; ?></li>
                </ul>

                <h3><?= $publication['title'] ?></h3>
                <div class="preview"><img src="<?= $publication->getImage()->getURL() ?>" alt=""></div>
                <p><?= $publication['preview'] ?></p>
                <p><b>Коментарии: </b><?= $publication['count'] ?> </p>
                <a href="<?= \yii\helpers\Url::to(['publication/view', 'id' => $publication['id']]) ?>">Читать
                    дальше</a>

            </div>
            <hr>

        </div>
    </div>


<?php endforeach; ?>