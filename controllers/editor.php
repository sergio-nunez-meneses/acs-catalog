<?php
require_once 'db.php';

class Editor extends Database
{

  public function content_editor()
  {

    if (basename($_SERVER['SCRIPT_FILENAME']) !== 'index.php') {
      $element = '';
      $element_type = $_GET['element'];
      $element_id = $_GET['id'];

      if ($element_type === 'articles') {
        $stmt = $this->run_query('SELECT * FROM articles JOIN authors ON articles.author_id = authors.author_id WHERE article_id = :element_id', ['element_id' => $element_id]);
        $element = $stmt->fetch();
      }

      $title = 'article_title';
      $text = 'article_text';
      $image = 'article_image';
      $author_id = 'author_id';
      $archived = 'article_archived';

      $username = $_SESSION['user'];
      $stmt = $this->run_query('SELECT * FROM authors WHERE author_username = :username', ['username' => $username]);
      $author = $stmt->fetch();
      ?>

      <form id="editorForm" class="" name="editor-form" action="../actions/process_content.php" method="POST" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;" style="display: flex; justify-content: center; padding: 1rem;">
        <fieldset class="ajax-form-container" style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
          <legend>element handler</legend>
          <select id="elementContent" class="" name="content[]">
            <option value="<?php echo $element_type; ?>"><?php echo $element_type; ?></option>
          </select>
          <?php
          if ($element[$archived]) {
            ?>
            <select id="elementArchive" class="" name="archive[]">
              <option value="<?php echo $element[$archived]; ?>">archived</option>
              <option value="0">unarchive</option>
            </select>
            <?php
          } else {
            ?>
            <select id="elementArchive" class="" name="archive[]">
              <option value="<?php echo $element[$archived]; ?>">unarchived</option>
              <option value="1">archive</option>
            </select>
            <?php
          }
          ?>
          <input id="elementId" class="" type="number" name="id" value="<?php echo $element_id; ?>" placeholder="id: <?php echo $element_id; ?>">
          <input id="titleElement" class="" type="text" name="title" value="<?php echo $element[$title]; ?>" placeholder="title: <?php echo $element[$title]; ?>">
          <input id="elementAuthor" class="" type="number" name="author[]" value="<?php echo $author['author_id']; ?>" placeholder="author: <?php echo $author['author_username']; ?>">
          <input type="hidden" name="images[]" value="<?php echo $element[$image]; ?>">
          <input id="elementImage" class="" type="file" multiple name="images[]" value="<?php echo $element[$image]; ?>">
          <textarea id="elementText" class="" name="text" cols="50" rows="8" placeholder=""><?php echo $element[$text]; ?></textarea>
          <legend>choose action</legend>
          <select id="elementAction" class="" name="action[]">
            <option></option>
            <option>create</option>
            <option>edit</option>
            <option>archive</option>
            <option>delete</option>
          </select>
          <button id="elementSubmit" class="" type="submit" name="button">submit</button>
        </fieldset>
      </form>
      <?php
    } else {
      $username = $_SESSION['user'];
      $stmt = $this->run_query('SELECT * FROM authors WHERE author_username = :username', ['username' => $username]);
      $author = $stmt->fetch();

      $stmt = $this->run_query('SELECT COUNT(*) AS total FROM articles');
      $last_id = $stmt->fetch();
      ?>

      <form id="editorForm" class="" action="actions/process_content.php" method="POST" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;" style="display: flex; justify-content: center; padding: 1rem;">
        <fieldset class="ajax-form-container" style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
          <legend>create element</legend>
          <select class="" name="content[]">
            <option value=""></option>
            <option value="articles">article</option>
          </select>
          <input class="" type="number" name="id" value="<?php echo $last_id['total'] + 1; ?>" placeholder="element id:">
          <input class="" type="text" name="title" value="" placeholder="element title:">
          <input class="" type="number" name="author" value="<?php echo $author['author_id']; ?>" placeholder="author:">
          <input class="" type="file" multiple name="images[]" value="">
          <textarea class="" name="text" cols="50" rows="8" placeholder="element text"></textarea>
          <legend>choose action</legend>
          <select class="" name="action[]">
            <option></option>
            <option>create</option>
            <option>edit</option>
            <option>archive</option>
            <option>delete</option>
          </select>
          <button id="elementSubmit" class="" type="submit" name="button">submit</button>
        </fieldset>
      </form>
      <?php
    }
  }

  public function process_content()
  {
    $form = 'ajax-element-form';
    $error = false;
    $element_type = $element_title = $element_text = $action = $action_msg = $error_msg = '';

    date_default_timezone_set('Europe/Paris');

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
      $error = true;
      $error_msg .= '<p>sign in to edit this article</p>';
    } else {
      if (empty($_POST['title'])) {
        $error = true;
        $error_msg .= '<p>title cannot be empty</p>';
      } elseif (strlen($_POST['title']) < 5) {
        $error = true;
        $error_msg .= '<p>title must contain more than 5 characters</p>';
      } else {
        $element_title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['text'])) {
        $error = true;
        $error_msg .= '<p>text cannot be empty</p>';
      } elseif (strlen($_POST['text']) < 10){
        $error = true;
        $error_msg .= '<p>text must contain more than 10 characters</p>';
      } else {
        $element_text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);
      }

      if (!$error) {
        $element_type = $_POST['content'][0];
        $element_id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $element_date = filter_var(substr(date("Y-m-d H:i:sa"), 0, -2), FILTER_SANITIZE_STRING);

        $image_dir = '../public/img/';
        $element_image = filter_var($_FILES['images']['name'][0], FILTER_SANITIZE_STRING);
        move_uploaded_file($_FILES['images']['tmp_name'][0], $image_dir . $element_image);

        $username = $_SESSION['user'];
        $stmt = $this->run_query('SELECT author_id FROM authors WHERE author_username = :username', ['username' => $username]);
        $author = $stmt->fetch();
        $author_id = $author['author_id'];

        if ($_POST['action'][0] === 'create') {
          $element_archived = 0;

          if ($_POST['content'][0] === 'articles') {
            $this->run_query('INSERT INTO articles VALUES (NULL, :element_title, :element_image, :element_text, NOW(), :element_archived, :author_id)', [
              'element_title' => $element_title,
              'element_image' => $element_image,
              'element_text' => $element_text,
              'element_archived' => $element_archived,
              'author_id' => $author_id
            ]);
          }
          $action = $_POST['action'][0];
          $action_msg .= '<p>element created</p>';
        } elseif ($_POST['action'][0] === 'edit') {
          $element_archived = $_POST['archive'][0];

          if ($_POST['content'][0] === 'articles') {
            $this->run_query('UPDATE articles SET article_title = :element_title, article_text = :element_text, DATETIME = NOW(), article_image = :element_image, author_id = :author_id, article_archived = :element_archived WHERE article_id = :element_id', [
              'element_title' => $element_title,
              'element_text' => $element_text,
              'element_image' => $element_image,
              'author_id' => $author_id,
              'element_archived' => $element_archived,
              'element_id' => $element_id
            ]);
          }
          $action = $_POST['action'][0];
          $action_msg .= '<p>element edited</p>';
        } elseif ($_POST['action'][0] === 'archive') {
          $element_archived = 1;

          if ($_POST['content'][0] === 'articles') {
            $this->run_query('UPDATE articles SET article_archived = :element_archived WHERE article_id = :element_id', [
              'element_archived' => $element_archived,
              'element_id' => $element_id
            ]);
          }
          $action = $_POST['action'][0];
          $action_msg .= '<p>element archived</p>';
        } elseif ($_POST['action'][0] === 'delete') {
          if ($_POST['content'][0] === 'articles') {
            $this->run_query('DELETE FROM articles WHERE article_id = :element_id', ['element_id' => $element_id]);
          }
          $action = $_POST['action'][0];
          $action_msg .= '<p>element deleted</p>';
        } else {
          $error_msg .= '<p>could not perform requested action</p>';
        }

        // back to AJAX.js
        $array = [
          'form' => $form,
          'action' => $action,
          'action_message' => $action_msg,
          'element' => $element_type,
          'id' => $element_id,
          'title' => $element_title,
          'text' => $element_text,
          'date' => $element_date,
          'image' => $image_dir . $element_image,
          'author' => $author_id
        ];
        echo json_encode($array);
      }
    }
  }
}
