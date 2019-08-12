<?php

/* Парсер http://reyestr.court.gov.ua - файл функций */

function touch_gr() {
	
	/* Заголовки запроса */
	$headers = array(
	
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		'Accept-Encoding: gzip, deflate',
		'Accept-Language: en-US,en;q=0.5',
		'Connection: keep-alive',
		'Host: www.reyestr.court.gov.ua',
		'Upgrade-Insecure-Requests: 1',
		'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0',
	
	);

	/* CURL */
	$ci = curl_init();
		
		var_dump(_URL);
	curl_setopt($ci, CURLOPT_URL, _URL);
	curl_setopt($ci, CURLOPT_HEADER, 0);
	curl_setopt($ci, CURLOPT_TIMEOUT, 10);
	curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ci, CURLOPT_ENCODING, 'gzip');
	curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ci, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0');
	//curl_setopt($ci, CURLOPT_COOKIEFILE, 'cookie.txt');
	//curl_setopt($ci, CURLOPT_COOKIEJAR, 'cookie.txt');
	
	$ce = curl_exec($ci);
	curl_close($ci);
	
	echo $ce;	
	
}

/*
	Функция поиска
	$word - ключевое слово
	$date_from - дата "от"
	$date_to - дата "до"
	$per_page - кол-во в выдаче
*/
function do_search($word, $date_from = false, $date_to = false, $per_page = 100) {
	
	/* Заголовки запроса */
	$headers = array(
	
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
		'Accept-Encoding: gzip, deflate',
		'Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
		'Cache-Control: max-age=0',
		'Connection: keep-alive',
		'Content-Type: application/x-www-form-urlencoded',
		'Host: reyestr.court.gov.ua',
		'Origin: http://reyestr.court.gov.ua',
		'Referer: http://reyestr.court.gov.ua/',
		'Upgrade-Insecure-Requests: 1',
		'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132',
	
	);
	
	/* POST */
	$post = array(
	
		'SearchExpression' => $word,
		'UserCourtCode' => '',
		'ChairmenName' => '',
		'RegNumber' => '',
		'RegDateBegin' => '',
		'RegDateEnd' => '',
		'ImportDateBegin' => '',
		'ImportDateEnd' => '',
		'CaseNumber' => '',
		'Sort' => 0,
		'PagingInfo.ItemsPerPage' => $per_page,
		'Liga' => 'true',
	
	);
	
	/* Если указаны даты - добавляем их к запросу */
	if ($date_from) {
		$post['RegDateBegin'] = $date_from;
	}
	if ($date_to) {
		$post['RegDateEnd'] = $date_to;
	}
	
	$post = http_build_query($post);
	
	/* Заголовок "Content-Length" */
	$headers[] = 'Content-Length: '.strlen($post);
	
	print_r($headers);
		
	/* CURL */
	$ci = curl_init();
	
	var_dump(_URL);
	
	curl_setopt($ci, CURLOPT_URL, _URL);
	curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ci, CURLOPT_ENCODING, 'gzip');
	curl_setopt($ci, CURLOPT_POST, 1);
	curl_setopt($ci, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ci, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.132');
	curl_setopt($ci, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ci, CURLOPT_COOKIEJAR, 'cookie.txt');
	
	$ce = curl_exec($ci);
	curl_close($ci);
	
	echo $ce;
	
}

?>