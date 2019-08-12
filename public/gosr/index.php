<?php

/* Парсер http://reyestr.court.gov.ua */

/* Файл настроек, файл функций */
require('config.php');
require('functions.php');

/* Проверяем, существует ли файл с искомыми словами */
if (!file_exists(_FILE_KEYS)) {
	die('PARSER: Keywords file does not exist!');
}

/* Помещаем в массив слова из файла */
$words = file(_FILE_KEYS);

touch_gr();
exit;
do_search('судо', '15.05.2019', '19.05.2019');

?>