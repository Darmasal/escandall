<?php

//controlar que l'usuari és correcte
//sino redirecció a la web de login
//per establir, primer objectiu fer funcionar programa sense control d'usuaris
//session_start();
//if (isset($_SESSION["USER"])){

header("Content-Type:application/json");

//Rebre objecte json per POST

/*
// Handling data in JSON format on the server-side using PHP
//
header("Content-Type: application/json");
// build a PHP variable from JSON sent using POST method
$v = json_decode(stripslashes(file_get_contents("php://input")));
// build a PHP variable from JSON sent using GET method
$v = json_decode(stripslashes($_GET["data"]));
// encode the PHP variable to JSON and send it back on client-side
echo json_encode($v);
*/


if (isset($_GET['order_id']) && $_GET['order_id']!="") {
    include ('inc/config.php');
	include ('class/mysqlclase.php');
	$order_id = $_GET['order_id'];
    $con = Conectarse();
	$result = mysqli_query(
	$con,
	"SELECT * FROM `e_materies`");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$amount = $row['Materia'];
	$response_code = $row['Umesura'];
	$response_desc = $row['Preu'];
	response($order_id, $amount, $response_code,$response_desc);
	mysqli_close($con);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($order_id,$amount,$response_code,$response_desc){
	$response['order_id'] = $order_id;
	$response['amount'] = $amount;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}


// Si l'usuari no està en sessió
//pendent de desarrollar

//}
//else{
//    header("Location: escandalllog.php");
//    die();
//}


?>
