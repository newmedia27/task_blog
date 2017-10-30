<?php

use yii\db\Migration;

class m171030_012334_add_collum_commemt_status_table_blog extends Migration
{
    public function safeUp()
    {
        $sql = ' ALTER TABLE `blog` 
ADD COLUMN `coment_status` INT NOT NULL DEFAULT 1 AFTER `date_create`;';
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        echo "m171030_012334_add_collum_commemt_status_table_blog cannot be reverted.\n";

        return false;
    }


}
