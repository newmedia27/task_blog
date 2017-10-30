<?php

use yii\db\Migration;

class m171030_010819_create_table_blog extends Migration
{
    public function safeUp()
    {
        $sql = 'CREATE TABLE `blog` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `author` INT NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `img` VARCHAR(45) NOT NULL,
  `date_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `date_create_UNIQUE` (`date_create` ASC),
  INDEX `fkey_user_idx` (`author` ASC),
  CONSTRAINT `fkey_user`
    FOREIGN KEY (`author`)
    REFERENCES `yii.test`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);';
       return Yii::$app->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        echo "m171030_010819_create_table_blog cannot be reverted.\n";

        return false;
    }


}
