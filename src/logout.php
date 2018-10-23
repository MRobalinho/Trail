<?php
ob_start();
?>
<html>
<head>
	<title>Saindo do Aplicativo</title>
</head>
<body bgcolor="white">
	<h2>Saindo do Aplicativo</h2>
</body>
</html>
<?php
session_start();
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy();
ob_clean();
header("location: http://www.google.com"); 
?>