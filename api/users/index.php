<?php 

include('../../db/connection.php');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case "DELETE":
        if (isset($_GET['id'])){
            $user_id = $_GET['id'];
            handleDeleteUser($conn, $user_id);
        }
       else{
        http_response_code(405);
       }
        break;
    default:
        http_response_code(405);
        break;
}

function handleDeleteUser($conn, $user_id) {
    $sql = "DELETE FROM users WHERE user_id = $user_id";

    if ($conn->query($sql)){
        echo json_encode(["message" => "User Deleted Successfully"]);
    }
}

?>