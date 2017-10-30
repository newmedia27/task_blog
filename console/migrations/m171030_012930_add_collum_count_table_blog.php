<?php

use yii\db\Migration;

class m171030_012930_add_collum_count_table_blog extends Migration
{
    public function safeUp()
    {
        $sql = 'ALTER TABLE `yii.test`.`blog` 
ADD COLUMN `count` INT NOT NULL DEFAULT 0 AFTER `preview`;
';
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        echo "m171030_012930_add_collum_count_table_blog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171030_012930_add_collum_count_table_blog cannot be reverted.\n";

        return false;
    }
    */
}
