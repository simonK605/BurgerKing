<?php

require_once "../../db.php";

$id = $_GET["id"];

$query = "DELETE FROM home WHERE id='$id'";
$result = mysqli_query($mysqli, $query);

if(!$result){
    echo mysqli_error($mysqli);
}
else{
    header("Location: ../homeSection.php");
}