<?php 

include('../../db/connection.php');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case "GET":
        if (isset($_GET['query']) && $_GET['query'] == "photos"){
            getPhotosAnalytics($conn);
        }
        elseif(isset($_GET['query']) && $_GET['query'] == "users"){
            getUsersAnalytics($conn);
        }
       else{
        http_response_code(405);
       }
        break;
    default:
        http_response_code(405);
        break;
}


function getPhotosAnalytics($conn) {
    $sql = "SELECT count(*) as total_photos from photos";

    $result = mysqli_query($conn, $sql);

    if ($result){
        $countData = mysqli_fetch_assoc($result);

        echo json_encode($countData);
    }
}
function getUsersAnalytics($conn) {
    
    $countQuery = "SELECT COUNT(*) AS total_users FROM users";
    $countResult = mysqli_query($conn, $countQuery);

  
    $userDataQuery = "SELECT * FROM users";
    $userDataResult = mysqli_query($conn, $userDataQuery);

   
    $countData = mysqli_fetch_assoc($countResult);

  
    while ($row = mysqli_fetch_assoc($userDataResult)) {
        $userData[] = $row;
    }

    
    $resultData = [
        'total_users' => $countData['total_users'],
        'users_data' => $userData
    ];
    echo json_encode($resultData);
}

?>