<?php
require_once 'db.php';

class Articles extends Database
{

  public function display_content($element)
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

      <div class="element-box" style="border: 1px solid #000; margin: 1rem;">
        <img class="element-image" src="<?php echo '../public/img/' . $row[$image] ?>">
        <div class="transparent-box">
          <div class="element-caption">
            <header>
              <h3>
                <a class="element-title" href="../templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>">
                  <?php echo $row[$title]; ?>
                </a>
              </h3>
              <div class="">
                <p class="element-date">on <?php echo $formatted_date; ?></p>
                <p class="element-author">by <?php echo $row[$author]; ?></p>
              </div>
            </header>
            <main>
            <p> <?php echo $shorten_text; ?>...</p>
            <a class="opacity-low" href="../templates/article.php?id=<?php echo $row[$id]; ?>&element=<?php echo $element; ?>">continue reading</a>
            </main>
          </div>
        </div>
      </div>
    <?php
    }
  }

  public function display_element()
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

    if(isset($_SESSION['logged_in'])) {
      if ($element['author_username'] === $_SESSION['user']) {
        ?>
        <button id="handler-tab">edit</button>
        <?php
      }
    }
    ?>

    <div id="element-<?php echo $element_id; ?>" class="focus-element-container">
      <section class="focus-element-header">
        <img id="image-<?php echo $element_id; ?>" class="focus-element-image" src="<?php echo '../public/img/' . $element[$image]; ?>">
      </section>
      <div class="focus-content-container">
        <h2 id="title-<?php echo $element_id; ?>" class="focus-element-title"> <?php echo $element[$title]; ?></h2>
        <p id="date-<?php echo $element_id; ?>" class="focus-element-date">on <?php echo $formatted_date; ?></p>
        <p class="focus-element-username">by <?php echo $element['author_username'] ?></p>
        <article id="text-<?php echo $element_id; ?>" class="focus-element-text"><?php echo $formatted_text; ?></article>
      </div>
    </div>
    <?php
  }
}
