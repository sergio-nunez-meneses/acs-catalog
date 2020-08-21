<?php
$title = 'search';
include '../includes/header.php';

$keyword = $_POST['search'];

if(!empty($keyword)){
  $pdo = new Database;
  $keyword = $_POST['search'];

  $query_selection = "SELECT * FROM articles WHERE article_title LIKE '%$keyword%' OR article_text LIKE '%$keyword%' OR article_genre LIKE '%$keyword%'";
  $articles = $pdo->run_query($query_selection)->fetchAll();

  if(!empty($articles)) {
    foreach($articles as $article){
      echo $article['article_image'] . "<br>";
      echo $article['article_title'] . "<br>";
      echo $article['DATETIME'] . "<br>";
      echo $article['article_text'] . "<br>";
      echo $article['author_id'] . "<br>";
    }
  } else{
    echo "no posts have been found";
  }
} else{
  header("Location:../index.php");
}
