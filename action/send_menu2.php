<?php
include '../components/core.php';

// $value = $_POST['value'];
// if(isset($_POST["heart"])){
    // $_SESSION['eating'] = eating();
    $value=$_POST["value"];
    $eating=getMeal($value, true);
// }
$response = [$eating];
header('Content-type: application/json');
echo json_encode($response);
?>