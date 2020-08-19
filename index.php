<?php
$title = 'ACS News';
include 'includes/header.php';
?>

<!-- errors display -->
<section>
  <div class="" style="display: flex; justify-content: center;">
    <?php if (!empty($_GET['error'])) echo $_GET['error_message']; ?>
  </div>
</section>

<!-- content -->
<section>
  <div id="back" class="">
    <div class="content-wrapper">
      <div class="" style="display: flex; flex-direction: column; justify-content: space-around; align-content: center; align-items: center;">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          ?>
          <button id="articlesTab" class="">all articles</button>
          <?php
        }
        ?>
      </div>
      <div id="recentArticles" class="">
        <?php (new Articles())->display_all_elements('articles'); ?>
      </div>
      <div id="allArticles" class="hidden">
        <?php (new Articles())->display_all_elements('all_articles'); ?>
      </div>
    </div>
  </div>
</section>

<!-- create article -->
<section>
  <div id="createContainer" class="hidden">
    <div id="newArticleContainer" class="article-container">
      <?php (new Editor())->content_editor(); ?>
      <p id="ajaxResponse" class="info"></p>
    </div>
  </div>
</section>

<!-- sign -->
<section class="sign-form-container" style="display: flex; flex-direction: column; align-items: center;">
  <button id="sign-in-tab" class="">sign up</button>
  <form id="sign-in-form" class="" method="POST" action="models/sign_in.php">
    <fieldset class="">
    <legend>sign in</legend>
    <input class="" type="text" name="username" value="" placeholder="username" required>
    <input class="" type="password" name="password" value="" placeholder="password" required>
    <input class="" type="submit" name="sign-in" value="sign in">
    </fieldset>
  </form>
  <form id="sign-up-form" class="hidden" method="POST" action="models/sign_up.php">
    <fieldset class="">
    <legend>sign up</legend>
    <input class="" type="text" name="username" placeholder="username" required>
    <input class="random-password" type="password" name="password" placeholder="password" required>
    <input class="random-password" type="password" name="confirm-password" placeholder="confirm password" required>
    <input id="generatorButton" type="button" value="generate password">
    <input class="" type="submit" name="sign-up" value="sign up">
    </fieldset>
  </form>
  <p id="displayErrors"></p>
</section>


<?php include 'includes/footer.php'; ?>
