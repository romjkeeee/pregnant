<?php

$post = json_encode($_POST, JSON_UNESCAPED_UNICODE);
file_put_contents('diag_hod_casti.json', $post);

?>