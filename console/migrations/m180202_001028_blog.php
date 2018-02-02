<?php

use yii\db\Migration;

class m180202_001028_blog extends Migration
{
    public function up()
    {
        $sql = 'CREATE TABLE `blog` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `author` INT NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `img` VARCHAR(45) NOT NULL,
  `date_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `coment_status` INT NOT NULL DEFAULT 1,
  `preview` TEXT NOT NULL,
  `text` TEXT NULL,
  `count` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `date_create_UNIQUE` (`date_create` ASC),
  INDEX `fkey_user_idx` (`author` ASC));';
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        echo "m180202_001028_blog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_001028_blog cannot be reverted.\n";

        return false;
    }
    */
}
