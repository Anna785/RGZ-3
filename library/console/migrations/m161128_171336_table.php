<?php

use yii\db\Migration;

class m161128_171336_table extends Migration
{
    public function up()
    {
	$hash = '$2y$13$lufwA14Oithn.oG/cLwGH.JHkXz97eroUvlFlUJ9jYrNT5tOQzrcS';
	$this->execute("CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `patronymic_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `first_name`, `last_name`, `patronymic_name`, `date_of_birth`) VALUES
(1, 'Михаил', 'Булгаков', 'Афанасьевич', '1891-05-15'),
(2, 'Николай', 'Гоголь ', 'Васильевич', '1809-03-31'),
(3, 'Федор', 'Достоевский', 'Михайлович', '1821-11-11'),
(4, 'Лев', 'Толстой', 'Николаевич', '1828-09-09'),
(5, 'Антон', 'Чехов', 'Павлович', '1860-01-29'),
(6, 'Александр', 'Куприн', 'Иванович', '1870-09-07'),
(7, 'Александр', 'Пушкин', 'Сергеевич', '1799-06-06'),
(9, 'Иван', 'Тургенев', 'Сергеевич', '1818-11-09'),
(10, 'Михаил', 'Лермонтов', 'Юрьевич', '1814-10-15'),
(31, 'Иван', 'Гончаров  ', 'Александрович', '1812-06-18');
--
-- Структура таблицы `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publishing_house` varchar(200) NOT NULL,
  `year_of_publishing` year(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `genre`, `author_id`, `publishing_house`, `year_of_publishing`, `status`) VALUES
(1, 'Мертвые души', 'Поэма', 2, 'Фламинго', 1990, 1),
(3, 'Тарас Бульба', 'Повесть', 2, 'Сфера', 1999, 0),
(5, 'Мастер и Маргарита ', 'Роман', 1, 'Сфера', 2009, 1),
(6, 'Собачье сердце', 'Повесть', 1, 'Фламинго', 1996, 0),
(7, 'Преступление и наказание', 'Роман', 3, 'Фламинго', 1999, 1),
(8, 'Идиот', 'Роман', 3, 'Текст', 2000, 0),
(9, 'Война и мир', 'Роман-эпопея', 4, 'Текст', 2005, 1),
(10, 'Анна Каренина', 'Роман', 4, 'Сфера', 2010, 0),
(11, 'Дама с собачкой', 'Рассказ', 5, 'Фламинго', 2004, 1),
(12, 'Человек в футляре', 'Рассказ', 5, 'Сфера', 2000, 0),
(13, 'Гранатовый браслет', 'Повесть', 6, 'Текст', 2006, 1),
(14, 'Поединок', 'Повесть', 6, 'Фламинго', 2005, 0),
(15, 'Капитанская дочка', 'Роман', 7, 'Сфера', 2008, 1),
(16, 'Дубровский', 'Роман', 7, 'Радуга', 2007, 0),
(17, 'Отцы и дети', 'Роман', 9, 'Звезда', 2009, 1),
(18, 'Записки охотника', 'Сборник рассказов', 9, 'Рассвет', 1999, 0),
(19, 'Герой нашего времени', 'Роман', 10, 'Рассвет', 2013, 1),
(20, 'Мцыри', 'Поэма', 10, 'Звезда', 2001, 1);

-- --------------------------------------------------------

--
--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--
	
    INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'YOv1-kYL0qrw18k-dO65UvnPsFqZz8KM', '$hash', NULL, 'admin@admin.ru', 10, 1480352748, 1480352748);
    }
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
");
    }

    public function down()
    {
        echo "m161128_171336_table cannot be reverted.\n";

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
