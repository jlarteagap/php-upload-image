<?php

ini_set("max_execution_time", "-1");
ini_set("memory_limit", "-1");

$response = array('status'=>false);

$parameters = file_get_contents('php://input');
$decodedParameters = json_decode($parameters, true);
$file = $decodedParameters["file"];

$fileRouteImage = $decodedParameters["uri"] . $file;

if(file_exists($fileRouteImage)) {
    unlink($fileRouteImage);
    $response['status'] = true;
}

// // Send JSON Data to AJAX Request
echo json_encode($response);
?>