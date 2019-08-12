<?php

/* Парсер http://reyestr.court.gov.ua - файл настроек */

/* URL реестра */
define('_URL', 'http://reyestr.court.gov.ua/');
//define('_URL', 'http://sound.aumagency.ru/public/gosr/index.php');

/* Файл с искомыми словами */
define('_FILE_KEYS', realpath(dirname(__FILE__)).'/keys.txt');

/* Файл с решениями, по которым были высланы уведомления */
define('_FILE_DONE', realpath(dirname(__FILE__)).'/done.txt');

/* Кол-во результатов в выдаче реестра */
define('_PER_PAGE', 25);

/* Дата "от" и "до" */
define('_DATE_FROM', '15.05.2019');
define('_DATE_TO', '19.05.2019');

?>