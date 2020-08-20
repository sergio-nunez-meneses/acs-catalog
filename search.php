<?php
require("controllers/db.php");
require("header.php");

$keyword = $_POST['search'];

if(!empty($keyword)){
  $pdo = new Database;
  $keyword = $_POST['search'];
  $articles = $pdo->run_query("SELECT * FROM articles WHERE article_genre LIKE $keyword")->fetchAll();

  foreach($articles as $article){
    foreach($article as $element){
      echo $element;
    }
  }
}
else{
  header("Location: index.php");
}



require("footer.php");
 ?>
