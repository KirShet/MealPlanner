<?php
include '../components/core.php';

    if(isset($_POST["radio"]))
    {
    $_SESSION['meal']['name'] = $_POST["radio"];
    echo $_SESSION['meal']['name'].'gg';
    }
    redirect();
?>