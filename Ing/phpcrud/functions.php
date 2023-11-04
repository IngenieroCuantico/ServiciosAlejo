<?php
function pdo_connect_mysql() {

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'darklight';
    $DATABASE_PASS = 'Zeus9119*';
    $DATABASE_NAME = 'ServiciosAlejandro';
	


	try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . 
						';dbname=' . $DATABASE_NAME . 
						';charset=utf8', $DATABASE_USER, $DATABASE_PASS);

    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Conexion No Conectada');
    }
}

function template_header($title) {

echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Servicios Ing. Alejandro</h1>
            <a href="index.php"><i class="fas fa-home"></i>Inicio</a>
    		<a href="read.php"><i class="fas fa-address-book"></i>Contactos</a>
			<a href=""><i class="fas fa-solid fa-yin-yang"> </i>Ingeniero Alejandro</a>
    	</div>
    </nav>




EOT;
}

function template_footer() {

echo <<<EOT
    </body>
</html>
EOT;
}
?>