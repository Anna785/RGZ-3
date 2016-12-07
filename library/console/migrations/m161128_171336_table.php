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
-- ���� ������ ������� `author`
--

INSERT INTO `author` (`id`, `first_name`, `last_name`, `patronymic_name`, `date_of_birth`) VALUES
(1, '������', '��������', '�����������', '1891-05-15'),
(2, '�������', '������ ', '����������', '1809-03-31'),
(3, '�����', '�����������', '����������', '1821-11-11'),
(4, '���', '�������', '����������', '1828-09-09'),
(5, '�����', '�����', '��������', '1860-01-29'),
(6, '���������', '������', '��������', '1870-09-07'),
(7, '���������', '������', '���������', '1799-06-06'),
(9, '����', '��������', '���������', '1818-11-09'),
(10, '������', '���������', '�������', '1814-10-15'),
(31, '����', '��������  ', '�������������', '1812-06-18');
--
-- ��������� ������� `book`
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
-- ���� ������ ������� `book`
--

INSERT INTO `book` (`id`, `name`, `genre`, `author_id`, `publishing_house`, `year_of_publishing`, `status`) VALUES
(1, '������� ����', '�����', 2, '��������', 1990, 1),
(3, '����� ������', '�������', 2, '�����', 1999, 0),
(5, '������ � ��������� ', '�����', 1, '�����', 2009, 1),
(6, '������� ������', '�������', 1, '��������', 1996, 0),
(7, '������������ � ���������', '�����', 3, '��������', 1999, 1),
(8, '�����', '�����', 3, '�����', 2000, 0),
(9, '����� � ���', '�����-������', 4, '�����', 2005, 1),
(10, '���� ��������', '�����', 4, '�����', 2010, 0),
(11, '���� � ��������', '�������', 5, '��������', 2004, 1),
(12, '������� � �������', '�������', 5, '�����', 2000, 0),
(13, '���������� �������', '�������', 6, '�����', 2006, 1),
(14, '��������', '�������', 6, '��������', 2005, 0),
(15, '����������� �����', '�����', 7, '�����', 2008, 1),
(16, '����������', '�����', 7, '������', 2007, 0),
(17, '���� � ����', '�����', 9, '������', 2009, 1),
(18, '������� ��������', '������� ���������', 9, '�������', 1999, 0),
(19, '����� ������ �������', '�����', 10, '�������', 2013, 1),
(20, '�����', '�����', 10, '������', 2001, 1);

-- --------------------------------------------------------

--
--
-- ��������� ������� `user`
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
-- ���� ������ ������� `user`
--
	
    INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'YOv1-kYL0qrw18k-dO65UvnPsFqZz8KM', '$hash', NULL, 'admin@admin.ru', 10, 1480352748, 1480352748);
    }
--
-- ������� ���������� ������
--

--
-- ������� ������� `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- ������� ������� `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--

--
-- ������� ������� `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT ��� ���������� ������
--

--
-- AUTO_INCREMENT ��� ������� `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT ��� ������� `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT ��� ������� `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- ����������� �������� ����� ����������� ������
--

--
-- ����������� �������� ����� ������� `book`
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
