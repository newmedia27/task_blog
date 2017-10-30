<?php
//echo '<pre>';
//print_r($publications);
//echo '</pre>';

?>
<table>
    <?php foreach ($publications as $publication) : ?>
        <?php $img = $publication->getImage() ?>
        <tr><td><?= date('H:i:s d-m-y', strtotime($publication['date_create'])) ?></td></tr>

        <tr><td>Автор: <?= $publication['user']['username'] ?></tr></td>
        <tr>
            <td><img src="<?= $img->getUrl('150x150') ?>" alt=""></td>
            <td><i><?= $publication['preview'] ?></i></td>
        </tr>
        <tr>
            <td><b>Коментарии :</b> <?=  $publication['count']?></td>
            <td><a href="<?= \yii\helpers\Url::to(['publication/view', 'id' => $publication['id']]) ?>">Читать дальше</a></td>
        </tr>


    <?php endforeach; ?>
</table>
