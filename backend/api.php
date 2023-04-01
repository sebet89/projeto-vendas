<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once __DIR__ . "/config.php";

require_once "src/routes/api.php";

$request_method = $_SERVER["REQUEST_METHOD"];
$action = $_GET["action"];
$post_data = json_decode(file_get_contents("php://input"), true);

$response = handle_request($request_method, $action, $connection, $post_data);
echo json_encode($response);

pg_close($connection);
?>