<?php

use yii\db\Migration;

class m171030_013117_create_table_comments extends Migration
{
    public function safeUp()
    {
        $sql = 'CREATE TABLE `comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usr_id` INT NOT NULL,
  `blog_id` INT NOT NULL,
  `comments` TEXT NOT NULL,
  `date_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `date_create_UNIQUE` (`date_create` ASC),
  INDEX `fk_user_idx` (`usr_id` ASC),
  INDEX `fk_blog_idx` (`blog_id` ASC),
  CONSTRAINT `fk_user`
    FOREIGN KEY (`usr_id`)
    REFERENCES `yii.test`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_blog`
    FOREIGN KEY (`blog_id`)
    REFERENCES `yii.test`.`blog` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
';
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        echo "m171030_013117_create_table_comments cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171030_013117_create_table_comments cannot be reverted.\n";

        return false;
    }
    */
}
