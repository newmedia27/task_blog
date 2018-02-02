<?php

use yii\db\Migration;

class m180202_005534_create_fk_key_blog extends Migration
{
    public function up()
    {
        $sql = ' ALTER TABLE `blog` 
ADD CONSTRAINT `fkey_user`
    FOREIGN KEY (`author`)
    REFERENCES `user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE ;';
        return Yii::$app->db->createCommand($sql)->execute();

    }

    public function down()
    {
        echo "m180202_005534_create_fk_key_blog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_005534_create_fk_key_blog cannot be reverted.\n";

        return false;
    }
    */
}
