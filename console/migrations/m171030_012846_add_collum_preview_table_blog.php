<?php

use yii\db\Migration;

class m171030_012846_add_collum_preview_table_blog extends Migration
{
    public function safeUp()
    {
        $sql='ALTER TABLE `blog` 
ADD COLUMN `preview` TEXT NOT NULL AFTER `text`;
';
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        echo "m171030_012846_add_collum_preview_table_blog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171030_012846_add_collum_preview_table_blog cannot be reverted.\n";

        return false;
    }
    */
}
