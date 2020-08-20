<?php
require("controllers/db.php");
require("header.php");

$keyword = $_POST['search'];

if(!empty($keyword)){
  $pdo = new Database;
  $keyword = $_POST['search'];
  // $word = '';

  // switch($word){
  //   case is_array($keyword):
  //   $word == $keyword[1];
  //
  //   case is_string($keyword):
  //   $word == $$keyword;
  // }

  // $query_selection = "SELECT * FROM articles WHERE article_genre='in_array($word)' OR article_title='in_array($word)' OR article_text='in_array($word)' OR
  // article_genre='$word' OR article_title='$word' OR article_text='$word'";

$query_selection = "SELECT * FROM articles WHERE article_genre='$keyword' OR article_title='$keyword' OR article_text='$keyword'";

  $articles = $pdo->run_query($query_selection)->fetchAll();

  if(!empty($articles)){
    foreach($articles as $article){
      echo $article['article_image'] . "<br>";
      echo $article['article_title'] . "<br>";
      echo $article['DATETIME'] . "<br>";
      echo $article['article_text'] . "<br>";
      echo $article['author_id'] . "<br>";
    }
  }
  else{
    header("Location: search.php");
    echo "no posts found";
  }
}
else{
  header("Location: index.php");
}



require("footer.php");
 ?>
