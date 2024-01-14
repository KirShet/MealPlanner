<?php
include '../components/core.php';

// $value = $_POST['value'];
// if(isset($_POST["heart"])){
    // $_SESSION['eating'] = eating();
    $value=$_POST["value"];
    $_SESSION['meal'][$value]=getMeal($value, true);
// }
$response = ['message' => $value];
header('Content-type: application/json');
echo json_encode($response);
?>