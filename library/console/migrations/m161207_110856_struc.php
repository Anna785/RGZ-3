<?php

use yii\db\Migration;

class m161207_110856_struc extends Migration
{
    public function up()
    {
$this->execute("ALTER TABLE `library`.`author` ADD PRIMARY KEY (`id`);
	ALTER TABLE `author` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;");
    }

    public function down()
    {
        echo "m161207_110856_struc cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
