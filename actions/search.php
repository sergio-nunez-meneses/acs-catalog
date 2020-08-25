<?php
$title = 'search';
include '../includes/header.php';

$keyword = '%' . $_POST['search'] . '%';


if (!empty($keyword)) {
  // article_genre column must be renamed to article_category and be placed before DATETIME column
  $articles = (new Database())->run_query("SELECT * FROM articles WHERE article_title LIKE :keyword OR article_text LIKE :keyword OR article_category LIKE :keyword OR DATETIME LIKE :keyword", ['keyword' => $keyword])->fetchAll();

  $searchbtn = $_POST['search-btn'];
  $search = $_POST['search'];
  if(isset($searchbtn) && empty($search)){
    header("Location: ../index.php");
  }
  if (!empty($articles)) {
    foreach($articles as $article) {
      ?>

  <div class='search_pad'>
    <div class='afterpad row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>

      <div class='img_wrapper img-fluid col-auto d-none d-lg-block'>

          <img src='<?php echo REL_PATH;?>public/img/<?php echo $article['article_image']; ?>'  class='search_img img-fluid bd-placeholder-img'  width='300' height='auto' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: Thumbnail'>

      </div>

      <div class='col p-4 d-flex flex-column position-static'>

          <strong class='d-inline-block mb-2 text-primary'><?php echo $article['DATETIME'] ?></strong>
          <h1 class='search_title'><?php echo $article['article_title']; ?></h1>
          <h2 class='search_genre'><?php echo $article['article_genre']; ?></h2>

      </div>

    </div>

  </div>

<?php
    }
  } else {
    echo "<div class='nopost_div'>";
    echo "<p class='nopost'>no posts have been found!</p>";
    echo "</div>";
  }
}


include '../includes/footer.php';
