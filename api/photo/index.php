<?php

include('../../db/connection.php');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
         case 'GET':
        if (isset($_GET['search_query1'])){
            $searchQuery = $_GET['search_query1'];
        
            handleSearchSaved($conn, $searchQuery );
        }
        elseif(isset($_GET['search_query2'])){
            $searchQuery = $_GET['search_query2'];
            handleSearchAll($conn, $searchQuery );
        }
       
        else{
            getPhotos($conn);
        }
       
        break;
    
        case 'PATCH':
          
            $photo_id = isset($_GET['photo_id']) ? intval($_GET['photo_id']) : null;
        
        
            $putData = file_get_contents("php://input");
            $jsonData = json_decode($putData, true);
            $action = isset($jsonData['action']) ? $jsonData['action'] : null;
        
            if ($photo_id === null || $action === null) {
                http_response_code(400);
                
            } else {
                if ($action === 'remove') {
                    handleRemove($conn, $photo_id);
                } elseif ($action === 'save') {
                    handleSave($conn, $photo_id);
                } else {
                    http_response_code(400);
                    
                }
            }
            break;

            
            
   
        default:
            http_response_code(405);
            
}

function getPhotos($conn) {
    $result = mysqli_query($conn, 'SELECT * FROM photos');
    $photos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $photos[] = $row;
    }
    echo json_encode($photos);
}

function handleSave($conn, $photo_id) {
    $photo_id = intval($photo_id);
    $result = mysqli_query($conn, "SELECT * FROM photos WHERE photo_id = $photo_id");

    if ($result && mysqli_num_rows($result) > 0) {
        $existingData = mysqli_fetch_assoc($result);

       
        if ($existingData['isSaved'] == 1) {
            echo json_encode(['message' => 'Photo is already added to favorites']);
            return;
        }

        $updateSql = "UPDATE photos SET isSaved = 1 WHERE photo_id = $photo_id";

        if (mysqli_query($conn, $updateSql)) {
            echo json_encode(['message' => 'Photo added to favorites.']);
        } else {
            http_response_code(500); 
            
        }
    } else {
        http_response_code(404); 
        
    }
}

function handleRemove($conn, $photo_id) {
    $photo_id = intval($photo_id);
    
     $updateSql = "UPDATE photos SET isSaved = 0 WHERE photo_id = $photo_id";

        if (mysqli_query($conn, $updateSql)) {
            echo json_encode(['message' => 'Photo removed to favorites.']);
            
        } else {
            http_response_code(500); 
           
        }
    
}

function handleSearchAll($conn, $query){
    $searchQuery = isset($query) ? mysqli_real_escape_string($conn, $query) : '';
            
                
            $sql = "SELECT * FROM photos WHERE (name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%') AND isSaved = 1";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                $photos = [];
                if ($result->num_rows > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $photos[] = $row;
                    }
                    http_response_code(200);
                    echo json_encode($photos);
                }
                else{
                    http_response_code(404);
                    echo json_encode(['message' => 'No match results found']);
                }
            } else {
                http_response_code(500); 
               
            }
}

function handleSearchSaved($conn, $query){
    $searchQuery = isset($query) ? mysqli_real_escape_string($conn, $query) : '';
            
                
            $sql = "SELECT * FROM photos WHERE name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                $photos = [];
                if ($result->num_rows > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $photos[] = $row;
                    }
                    http_response_code(200);
                    echo json_encode($photos);
                }
                else{
                    http_response_code(404);
                    echo json_encode(['message' => 'No match results found']);
                }
            } else {
                http_response_code(500); 
               
            }
}
mysqli_close($conn);
?>
