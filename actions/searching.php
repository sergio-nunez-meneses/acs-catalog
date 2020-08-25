<?php
require_once '../controllers/db.php';

$found_articles = [];
$error = false;
$error_msg = '';

if (empty($_POST['search'])) {
  $error = true;
} else {
  $keyword = '%' . $_POST['search'] . '%';
}

if (!$error) {
  $search_articles = (new Database())->run_query("SELECT article_id, article_title FROM articles WHERE article_title LIKE :keyword OR article_text LIKE :keyword OR DATETIME LIKE :keyword", ['keyword' => $keyword])->fetchAll();

  if ($search_articles) {
    ?>
    <ul class="list-group">
    <?php
    foreach ($search_articles as $article) {
      ?>
      <!-- back to searchAJAX.js -->
      <li class="list-group-item">
        <a class="text-decoration-none" href="templates/article.php?id=<?php echo $article['article_id']; ?>&element=articles">
          <?php echo $article['article_title']; ?>
        </a>
      </li>
    <?php
    }
    ?>
      <li class="list-group-item">
        <a class="text-decoration-none" href="actions/search.php?keyword=<?php echo $_POST['search']; ?>">See all</a>
      </li>
    </ul>
    <?php
  } else {
    $error_msg .= '<p>No articles have been found</p>';
    echo $error_msg;
  }
} else {
  echo $error_msg;
}
