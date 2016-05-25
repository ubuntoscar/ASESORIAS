<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=basededatoslocal;host=127.0.0.1","root","123");
switch($_GET['Consultar']){
		// Buscar Último Dato
		case 1:
		    $statement=$pdo->prepare("SELECT valorx as x, valory as y FROM Medidas ORDER BY id DESC LIMIT 0,1");
		    //$statement=$pdo->prepare("SELECT UNIX_TIMESTAMP(CONVERT_TZ(fecha, '+00:00', @@global.time_zone))*1000 as x, valory as y FROM Medidas ORDER BY id DESC LIMIT 0,1");	//Para tomar el TIMESTAMP desde MySql
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break; 
		// Buscar Todos los datos
		default:
			
			$statement=$pdo->prepare("SELECT valorx as x, valory as y FROM Medidas ORDER BY id ASC");
			//$statement=$pdo->prepare("SELECT UNIX_TIMESTAMP(CONVERT_TZ(fecha, '+00:00', @@global.time_zone))*1000 as x, valory as y FROM Medidas ORDER BY id ASC");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;

}
?>
