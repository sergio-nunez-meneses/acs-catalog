<?php

require("controllers/db.php");

$db = new Database();
$stmt = $db->run_query('SELECT * FROM articles');
$articles = $stmt->fetchAll();

foreach($articles as $article){
  $pic = $article['article_image'];
  echo "<div class='card'>";
  echo "<form action='showArticle.php' method='post'>";
  echo "<input type='submit' name='img' value='$pic'><br>";

  echo $article['article_title'] . "<br>";

  echo $article['DATETIME'] . "<br>";
  echo "</form>";
  echo "</div>";
}



function showArticle(){
  $id = //##form input + format
  $stmt = $db->run_query('SELECT * FROM articles WHERE article_id = :id', ['id' => $id]);
  $article = $stmt->fetch();
  echo "<div class='show_article'>";
  echo "<h1 id='show_articleTitle'>" . $article['article_title'] . "</h1><br>";
  echo "<h5 id='show_articleTime'>" . $article['DATETIME'] . "</h5>";

  $show_img = $article['article_image'];
  echo "<img src='$pic' width='400' height='400'><br>";

  echo "<p>" . $article['article_text'] . "</p>";
  echo "</div>";
}



?>
