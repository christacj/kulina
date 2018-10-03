<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'database.php';
 
// instantiate product object
include_once 'user_review.php';
 
$database = new Database();
$db = $database->getConnection();
 
$userreview = new UserReview($db);
 
// get posted data
// $json = '[{"order_id":"6","product_id":"6","user_id":"6","rating":"6","review":"6"}]';
// $data = json_decode($json,true);
//$data = json_decode(file_get_contents("php://input"),true);
//$data = json_decode(file_get_contents("testcreate.json"));
$data = file_get_contents('testcreate.json');
$data = json_decode($data);
//$data = (object) $_POST;
var_dump($data);
 
// set userreview property values
$userreview->order_id = $data->order_id;
$userreview->product_id = $data->product_id;
$userreview->user_id = $data->user_id;
$userreview->rating = $data->rating;
$userreview->review = $data->review;
$userreview->created_at = date('Y-m-d H:i:s');
 
// create the userreview
if($userreview->create()){
    echo '{';
        echo '"message": "userreview was created."';
    echo '}';
}
 
// if unable to create the userreview, tell the user
else{
    echo '{';
        echo '"message": "Unable to create userreview."';
    echo '}';
}
?>