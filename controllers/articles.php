<?php
require_once 'db.php';

class Articles extends Database
{

  public function display_all_articles($element)
  {
    if ($element === 'articles') {
      $data = $this->run_query('SELECT * FROM articles WHERE article_archived = 0 ORDER BY article_id DESC LIMIT 6');
    } elseif ($element === 'all_articles') {
      $data = $this->run_query('SELECT * FROM articles ORDER BY article_id DESC LIMIT 6');
      $element = 'articles';
    }

    $id = 'article_id';
    $title = 'article_title';
    $text = 'article_text';
    $date = 'DATETIME';
    $image = 'article_image';
    $author = 'author_id';

    foreach ($data as $row) {
      $formatted_date = $row[$date];
      $formatted_date = date('jS F, Y H:i', strtotime($formatted_date));

      $shorten_text = $row[$text];
      $shorten_text = substr($row[$text], 0, 80);
      ?>
      <div class="col-lg-4 p-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">
              <a href="templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>">
                <?php echo $row[$title]; ?>
              </a>
            </h5>
            <p class="card-text text-dark text-muted"><?php echo $formatted_date; ?></p>
            <p class="card-text text-dark font-italic text-capitalize">by <?php echo $row[$author]; ?></p>
            <p class="card-text text-dark"><?php echo $shorten_text; ?>&hellip;</p>
            <a class="card-text text-dark" href="templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>">
              <button type="button" class="btn bg-dark text-white">Read more</button>
            </a>
          </div>
          <img src="public/img/<?php echo $row[$image]; ?>" class="card-img-top" alt="...">
        </div>
      </div>
    <?php
    }
  }

  public function display_article_header()
  {
    $element = $_GET['element'];
    $element_id = $_GET['id'];

    if ($element === 'articles') {
      $stmt = $this->run_query('SELECT * FROM articles JOIN authors ON articles.author_id = authors.author_id WHERE articles.article_id = :element_id', ['element_id' => $element_id]);

      $title = 'article_title';
      $date = 'DATETIME';
      $image = 'article_image';
      $author = 'author_id';
      $element = $stmt->fetch();

      $author_id = $element['author_id'];
      $stmt = $this->run_query('SELECT author_username FROM authors WHERE author_id = :author_id', ['author_id' => $author_id]);
      $author_name = $stmt->fetch();

      $formatted_date = $element[$date];
      $formatted_date = date('jS F, Y', strtotime($formatted_date));
      ?>
      <article class="">
        <header>
          <div class="row flex-column pt-3">
            <h2 id="title-<?php echo $element_id; ?>" class="text-capitalize font-weight-bolder"><?php echo $element[$title]; ?></h2>
            <hr class="horizontal-line bg-info">
            <p id="date-<?php echo $element_id; ?>" class="">On <?php echo $formatted_date; ?></p>
            <p id="author-<?php echo $element_id; ?>" class="text-capitalize font-italic">By <?php echo $author_name['author_username']; ?></p>
          </div>
          <img id="image-<?php echo $element_id; ?>" src="<?php echo '../public/img/' . $element[$image]; ?>" alt="" class="article-image img-fluid ">
          <div class="row">
            <!-- add base_url function -->
            <input id="articleLink" type="hidden" name="" value="http://snunezmeneses/acs-catalog/templates/article.php?id=<?php echo $element_id; ?>&element=<?php echo $_GET['element']; ?>">
          </div>
        </header>
      </article>
      <?php
    }
  }

  public function display_article_main()
  {
    $element = $_GET['element'];
    $element_id = $_GET['id'];

    if ($element === 'articles') {
      $stmt = $this->run_query('SELECT * FROM articles JOIN authors ON articles.author_id = authors.author_id WHERE articles.article_id = :element_id', ['element_id' => $element_id]);
      // JOIN article_categories ON articles.article_id = article_categories.article_id

      $text = 'article_text';
      $author = 'author_id';
      // $categories = "category_names";
      $element = $stmt->fetch();
    }

    $paragraphs = explode("\n", $element[$text]);
    $formatted_text = '';
    foreach ($paragraphs as $paragraph) {
      $formatted_text .= "<p>$paragraph</p>";
    }
    ?>
    <article class="container">
      <main>
        <div class="row justify-content-around p-3 text-justify">
          <p id="text-<?php echo $element_id; ?>" class="lead"><?php echo $formatted_text; ?></p>
        </div>
      </main>
      <hr class="horizontal-line bg-info">
      <footer>
        <h4>Share this:</h4>
        <div class="row justify-content-around p-3">
          <div class="">
            <a href="<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-twitter mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-linkedin mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-facebook mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div id="copyLink">
            <a href="javascript:void(0)" class="fa fa-copy mx-auto my-3 py-2 pr-4 pl-2 text-center text-decoration-none"></a>
          </div>
        </div>
        <hr class="horizontal-line bg-info">
        <div class="row p-3 justify-content-around">
          <nav class="">
            <a class="btn btn-outline-primary mx-5" href="article.php?id=<?php echo $element_id - 1; ?>&element=<?php echo $_GET['element']; ?>">Previous</a>
            <a class="btn btn-outline-secondary mx-5" href="article.php?id=<?php echo $element_id + 1; ?>&element=<?php echo $_GET['element']; ?>">Next</a>
          </nav>
        </div>
      </footer>
    </article>
    <?php
  }

  public function display_last_article()
  {
    $element = 'articles';
    $stmt = $this->run_query('SELECT * FROM articles WHERE article_archived = 0 ORDER BY DATETIME DESC LIMIT 1');
    $article = $stmt->fetch();

    $shorten_text = $article['article_text'];
    $shorten_text = substr($article['article_text'], 0, 80);
    ?>

    <div class="jumbotron my-2 p-4 p-md-5 text-dark rounded" style="background-image: url(<?php echo '\'' . 'public/img/' . $article['article_image'] . '\''; ?>);">
      <div class="col-md-12 px-0">
        <h1 class="display-4 font-italic"><?php echo $article['article_title']; ?></h1>
        <p class="lead my-3"><?php echo $shorten_text; ?></p>
        <p class="lead mb-0">
          <a href="templates/article.php?id=<?php echo $article['article_id']; ?>&element=<?php echo $element; ?>" class="text-dark font-weight-bold">
            Continue reading...
          </a>
        </p>
      </div>
    </div>

    <?php
  }

  public function get_article_link() {
    $element = $_GET['element'];
    $element_id = $_GET['id'];

    $link = 'article.php?id=' . $element_id . '&element=' . $_GET['element'];
    return $link;
  }
}
