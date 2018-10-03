<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'database.php';
 
// instantiate userreview object
include_once 'user_review.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare userreview object
$userreview = new UserReview($db);
 
// get userreview id
//$data = json_decode(file_get_contents("php://input"));
$data = file_get_contents('testdelete.json');
$data = json_decode($data);
 
// set userreview id to be deleted
$userreview->id = $data->id;
 
// delete the userreview
if($userreview->delete()){
    echo '{';
        echo '"message": "userreview was deleted."';
    echo '}';
}
 
// if unable to delete the userreview
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
?>