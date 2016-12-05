<?php

use yii\db\Migration;

class m161128_170608_stucture extends Migration
{
    public function up()
    {
	$this->execute("CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publishing_house` varchar(200) NOT NULL,
  `year_of_publishing` year(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;");
    }

    public function down()
    {
        echo "m161128_170608_stucture cannot be reverted.\n";

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
