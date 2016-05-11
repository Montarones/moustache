<?php

if ($user->is_connected()) $g_connexion = "<b>connected</b>";

echo '
<!DOCTYPE html>
<html>
<head>
    <title>azeaze</title>
	<link rel="stylesheet" href="/ui/style.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="connexion">'.$g_connexion.'</div>
<div class="status">'.$g_status.'</div>
<div class="page">
	<div class="menu">
		<a href="/">Home</a>
	</div>
	
	<div class="content">
		'.$g_content.'
	</div>
</body>
</html>
';



?>