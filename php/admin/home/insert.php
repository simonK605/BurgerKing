<?php

require_once "../../db.php";

$title1 = $_POST["title1"];
$title2 = $_POST["title2"];
$subtitle1 = $_POST["subtitle1"];
$subtitle2 = $_POST["subtitle2"];
$img1 = [];
$img2 = [];

foreach ($_FILES as $key => $file) {
	if ($file["error"] == 0) {
		$arr = explode("/", $file["type"]);
		$x = end($arr);
		if (preg_match("/(png || jpg || jpeg)/", $x)) {
			$y = mt_rand(1000000, 99999999);
			$y .= '.' . $x;
			if (move_uploaded_file($file["tmp_name"], "../../../img/home/" . $y)) {
				$$key = $y;
			}
		}
	}
}

$query = "INSERT INTO home (title1, title2, subtitle1, subtitle2, img1, img2)
VALUES ('$title1', '$title2', '$subtitle1', '$subtitle2', '$img1', '$img2')";

$result = mysqli_query($mysqli, $query);


if(!$result){
    echo mysqli_error($mysqli);
}
else{
    header("Location: ../homeSection.php");
}