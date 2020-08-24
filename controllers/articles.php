<?php
require_once 'db.php';

class Articles extends Database
{

  public function display_all_elements($element)
  {
    if ($element === 'articles') {
      $data = $this->run_query('SELECT * FROM articles WHERE article_archived = 0 ORDER BY article_id DESC LIMIT 10');
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

      <article class="news-card">
        <a href="templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>" class="news-card__card-link"></a>
        <img src="<?php echo 'public/img/' . $row[$image] ?>" alt="" class="news-card__image">
        <div class="news-card__text-wrapper">
          <header>
            <h2 class="news-card__title">
              <a class="element-title" href="templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>">
                <?php echo $row[$title]; ?>
              </a>
            </h2>
            <p class="news-card__post-date"><?php echo $formatted_date; ?></p>
            <p class="element-author">by <?php echo $row[$author]; ?></p>

          </header>
          <main class="news-card__details-wrapper">
            <p class="news-card__excerpt"><?php echo $shorten_text; ?>&hellip;</p>
            <a href="templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
          </main>
        </div>
      </article>
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
          <div class="row flex-column">
            <h4>Category</h4>
            <hr class="horizontal-line bg-info">
            <p id="date-<?php echo $element_id; ?>" class="">On <?php echo $formatted_date; ?></p>
            <h2 id="title-<?php echo $element_id; ?>" class=""><?php echo $element[$title]; ?></h2>
            <p id="author-<?php echo $element_id; ?>" class="">By <?php echo $author_name['author_username']; ?></p>
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
        <h4>Share this shit</h4>
        <div class="row justify-content-around p-3">
          <button class="btn btn-dark" type="button" name="button">icon</button>
          <button class="btn btn-dark" type="button" name="button">icon</button>
          <button class="btn btn-dark" type="button" name="button">icon</button>
          <button id="copyLink" class="btn btn-dark" type="button" name="button">copy article link</button>
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
    $stmt = $this->run_query('SELECT * FROM articles ORDER BY DATETIME DESC LIMIT 1');
    $article = $stmt->fetch();
    return $article;
  }

  public function get_article_link() {
    $element = $_GET['element'];
    $element_id = $_GET['id'];

    $link = 'article.php?id=' . $element_id . '&element=' . $_GET['element'];
    return $link;
  }
}
