<?php
$title = 'search';
include '../includes/header.php';

$keyword = $_POST['Search'];

if(!empty($keyword)){
  $pdo = new Database;

  $query_selection = "SELECT * FROM articles WHERE article_title LIKE '%$keyword%' OR article_text LIKE '%$keyword%' OR article_genre LIKE '%$keyword%'";
  $articles = $pdo->run_query($query_selection)->fetchAll();

  if(!empty($articles)) {
    foreach($articles as $article){
      echo "<div class='content-wrapper'>";
      echo "<div class='news-card'>";

      echo "<div class='img_wrapper'>";
      echo "<img src='".$article['article_image']."'class='search_img'><br>";
      echo "</div>";

      echo "<div class='news-card__text-wrapper'>";
      echo "<h2 class='news-card__title'>" . $article['article_title'] . "</h2><br>";
      echo "<h5 class='news-card__post-date'>" . $article['DATETIME'] . "</h5><br>";
      echo "</div>";

      echo "</div>";
      echo "</div>";
    }
  } else{
    echo "<div class='nopost_div'>";
    echo "<p class='nopost'>no posts have been found!</p>";
    echo "</div>";
  }
} else{
  header("Location: ../index.php");
}
