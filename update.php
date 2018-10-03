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
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare userreview object
$userreview = new UserReview($db);
 
// get id of userreview to be edited
//$data = json_decode(file_get_contents("php://input"));
$data = file_get_contents('testupdate.json');
$data = json_decode($data);

var_dump($data);
 
// set ID property of userreview to be edited
$userreview->id = $data->id;
 
// set userreview property values
$userreview->order_id = $data->order_id;
$userreview->product_id = $data->product_id;
$userreview->user_id = $data->user_id;
$userreview->rating = $data->rating;
$userreview->review = $data->review;
 
// update the userreview
if($userreview->update()){
    echo '{';
        echo '"message": "userreview was updated."';
    echo '}';
}
 
// if unable to update the userreview, tell the user
else{
    echo '{';
        echo '"message": "Unable to update userreview."';
    echo '}';
}
?>