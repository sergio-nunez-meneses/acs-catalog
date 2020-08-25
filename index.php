<?php
$title = 'ACS News';
include 'includes/header.php';
?>

<div class="container">

  <!-- DISPLAY ERRORS -->
  <section>
    <div class="d-flex justify-content-center">
      <?php if (!empty($_GET['error'])) echo $_GET['error_message']; ?>
    </div>
  </section>

  <!-- SOCIAL SIDEBAR -->
  <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f3e67e0bb613bef"></script> -->

  <!-- 'À LA UNE' -->
  <section>
    <?php echo (new Articles())->display_last_article(); ?>
  </section>

  <!-- DISPLAY ARTICLES -->
  <section>
    <div class="container">
      <div id="recentArticles" class="row justify-content-center">
         <?php (new Articles())->display_all_articles('articles'); ?>
      </div>
      <div id="allArticles" class="row justify-content-center hidden">
        <?php (new Articles())->display_all_articles('all_articles'); ?>
      </div>
    </div>
  </section>

  <!-- DISPLAY CREATED ARTICLE -->
  <section>
    <div id="createContainer" class="">
      <div id="newArticleContainer" class="">
      </div>
    </div>
  </section>

  <!-- EDITOR FORM -->
  <section>
    <div id="topForm" class="top-form position-fixed">
      <a id="closeTop" href="javascript:void(0)" class="close-btn d-block position-absolute text-decoration-none">&times;</a>
      <div class="side-form-content w-100 position-relative text-center">
        <?php (new Editor())->content_editor(); ?>
        <div class="d-flex justify-content-center">
          <p id="ajaxResponse" class="lead text-danger text-center"></p>
        </div>
      </div>
    </div>
  </section>

</div>

<?php include 'includes/footer.php'; ?>
