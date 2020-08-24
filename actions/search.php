<?php
$title = 'search';
include '../includes/header.php';

$keyword = '%' . $_POST['search'] . '%';


if (!empty($keyword)) {
  // article_genre column must be renamed to article_category and be placed before DATETIME column
  $articles = (new Database())->run_query("SELECT * FROM articles WHERE article_title LIKE :keyword OR article_text LIKE :keyword OR article_genre LIKE :keyword OR DATETIME LIKE :keyword", ['keyword' => $keyword])->fetchAll();

  $searchbtn = $_POST['search-btn'];
  $search = $_POST['search'];
  if(isset($searchbtn) && empty($search)){
    header("Location: ../index.php");
  }
  if (!empty($articles)) {
    foreach($articles as $article) {

    echo "<div class='search_pad'>";
      echo "<div class='afterpad row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>";

      echo "<div class='img_wrapper col-auto d-none d-lg-block'>";

          echo "<img src='".$article['article_image']."' class='search_img bd-placeholder-img'  width='250' height='100%' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: Thumbnail'>";

      echo "</div>";

        echo "<div class='col p-4 d-flex flex-column position-static'>";

          echo "<strong class='d-inline-block mb-2 text-primary'>" . $article['DATETIME'] . "</strong>";
          echo "<h1 class='search_title'>" . $article['article_title'] . "</h1>";
          echo "<h2 class='search_genre'>" . $article['article_genre'] . "</h2>";

        echo "</div>";

      echo "</div>";

    echo "</div>";

    }
  } else {
    echo "<div class='nopost_div'>";
    echo "<p class='nopost'>no posts have been found!</p>";
    echo "</div>";
  }
}



// <img src='".$article['article_image']."' width='100'>



// <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
//   <div class="col p-4 d-flex flex-column position-static">
//     <h3 class="mb-0">Post title</h3>
//     <div class="mb-1 text-muted">Nov 11</div>
//     <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
//     <a href="#" class="stretched-link">Continue reading</a>
//   </div>
//   <div class="col-auto d-none d-lg-block">
    // <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
//   </div>
// </div>
// </div>
