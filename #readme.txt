Jika menggunakan FORM
maka
uncomment
//$data = json_decode(file_get_contents("php://input"));

dan comment
$data = file_get_contents('testdelete.json');
$data = json_decode($data);