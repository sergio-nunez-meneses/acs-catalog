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

  public function display_single_element()
  {
    $element = $_GET['element'];
    $element_id = $_GET['id'];

    if ($element === 'articles') {
      $stmt = $this->run_query('SELECT * FROM articles JOIN authors ON articles.author_id = authors.author_id WHERE articles.article_id = :element_id', ['element_id' => $element_id]);
      // JOIN article_categories ON articles.article_id = article_categories.article_id

      $title = 'article_title';
      $text = 'article_text';
      $date = 'DATETIME';
      $image = 'article_image';
      $author = 'author_id';
      // $categories = "category_names";
    }

    $element = $stmt->fetch();
    $formatted_date = $element[$date];
    $formatted_date = date('jS F, Y H:i', strtotime($formatted_date));
    $paragraphs = explode("\n", $element[$text]);
    $formatted_text = '';

    foreach ($paragraphs as $paragraph) {
      $formatted_text .= "<p>$paragraph</p>";
    }

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      if ($element['author_username'] === $_SESSION['user']) {
        ?>
        <!-- <button id="handler-tab">edit</button> -->
        <?php
      }
    }
    ?>
    <article id="element-<?php echo $element_id; ?>" class="content-wrapper">
      <div class="news-card">
        <header>
          <img id="image-<?php echo $element_id; ?>" src="<?php echo '../public/img/' . $element[$image]; ?>" alt="" class="news-card__image">
          <div class="news-card__text-wrapper">
            <h2 id="title-<?php echo $element_id; ?>" class="news-card__title"><?php echo $element[$title]; ?></h2>
          </div>
        </header>
      </div>
      <main>
        <div class="container">
          <div class="content">
            <p id="date-<?php echo $element_id; ?>" class="news-card__post-date">on <?php echo $formatted_date; ?></p>
            <p id="author-<?php echo $element_id; ?>" class="news-card__details-wrapper">by <?php echo $element['author_username'] ?></p>
            <p id="text-<?php echo $element_id; ?>"><?php echo $formatted_text; ?></p>
            <a href="article.php?id=<?php echo $element_id - 1; ?>&element=<?php echo $_GET['element']; ?>">Precedent</a>
            <a href="article.php?id=<?php echo $element_id + 1; ?>&element=<?php echo $_GET['element']; ?>">Next</a>
          </div>
        </div>
      </main>
    </article>
    <?php
  }
}
