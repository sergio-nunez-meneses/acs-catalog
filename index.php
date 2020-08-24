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

<!-- social-bar -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f3e67e0bb613bef"></script>

<!-- content -->
<section>
  <!-- boutton article -->
  <div id="back" class="">
    <div class="content-wrapper">
      <div class="d-flex flex-column justify-content-around align-content-center align-items-center">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          ?>
          <button id="articlesTab" class="articlesbutton">all articles</button>
          <?php
        }
        ?>
      </div>

      <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
          <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
          </div>
        </div>

      <!-- affichage article -->
              <div id="recentArticles" class="col-md-offset-3 col-md-3">
                 <?php (new Articles())->display_all_elements('articles'); ?>
              </div>
              <div id="recentArticles" class="col-md-3">
                 <?php (new Articles())->display_all_elements('articles'); ?>
              </div>
              <div id="allArticles" class="col-md-3 hidden">
                <?php (new Articles())->display_all_elements('all_articles'); ?>
              </div>
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


<?php include 'includes/footer.php'; ?>
