<?php

/* Работа с VK - файл функций */

/*
	Функция авторизации VK
	$client_id - ID клиента
	$redirect_to - ID, куда будет перенаправлен пользователь после авторизации
*/
function vk_login($client_id, $redirect_to) {
	
	/* URL */
	$url = 'https://www.facebook.com/v3.3/dialog/oauth?client_id='.$client_id.'&display=popup&response_type=token&redirect_uri='.$redirect_to;
	echo $url; exit;
	?>
	<script type="text/javascript">
		var vk_data = window.location.hash.replace('#', '');
		document.cookie = 'vk_data='+vk_data;
	</script>
	<?php
	print_r($_COOKIE);
	
}

?>