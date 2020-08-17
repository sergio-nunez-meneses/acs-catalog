<?php

require("controllers/db.php");

$db = new Database();
$stmt = $db->run_query('SELECT * FROM articles');
$data = $stmt->fetchAll();

echo $data[0]['article_id'] . "<br>";
echo $data[0]['article_title'] . "<br>";

$pic = $data[0]['article_image'];
echo "<img src='$pic' width='64' height='64'><br>";

echo $data[0]['article_text'] . "<br>";
echo $data[0]['DATETIME'] . "<br>";
echo $data[0]['article_archived'] . "<br>";
echo $data[0]['article_id'] . "<br>";
 ?>
