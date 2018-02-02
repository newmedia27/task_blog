<?php

use yii\db\Migration;

class m180202_010636_create_second_fk_key_comments extends Migration
{
    public function up()
    {$sql = ' ALTER TABLE `comments`
      ADD  CONSTRAINT `fk_blog`
    FOREIGN KEY (`blog_id`)
    REFERENCES `blog` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;';
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        echo "m180202_010636_create_second_fk_key_comments cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_010636_create_second_fk_key_comments cannot be reverted.\n";

        return false;
    }
    */
}
