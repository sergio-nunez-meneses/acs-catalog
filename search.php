<?php
require("controllers/db.php");
require("header.php");

$keyword = $_POST['search'];

if(!empty($keyword)){
  $pdo = new Database;
  $keyword = $_POST['search'];

  $query_selection = "SELECT * FROM articles WHERE article_genre LIKE '%$keyword%'";
  $articles = $pdo->run_query($query_selection)->fetchAll();

  foreach($articles as $article){
    echo $article['article_image'] . "<br>";
    echo $article['article_title'] . "<br>";
    echo $article['DATETIME'] . "<br>";
    echo $article['article_text'] . "<br>";
    echo $article['author_id'] . "<br>";
  }

}
else{
  header("Location: index.php");
}



require("footer.php");
 ?>
