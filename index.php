<?php
$title = 'ACS News';
include 'includes/header.php';
?>

<div class="container">
  <!-- errors display -->
  <section>
    <div class="d-flex justify-content-center">
      <?php if (!empty($_GET['error'])) echo $_GET['error_message']; ?>
    </div>
  </section>

  <!-- social-bar -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f3e67e0bb613bef"></script>

  <!-- content -->
  <section>
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <?php echo (new Articles())->display_last_article(); ?>
    </div>

    <!-- affichage article -->
    <div id="recentArticles" class="">
       <?php (new Articles())->display_all_articles('articles'); ?>
    </div>
    <div id="allArticles" class="col-md-3 hidden">
      <?php (new Articles())->display_all_articles('all_articles'); ?>
    </div>
  </section>

  <!-- create article -->
  <section>
    <div id="topForm" class="top-form position-fixed">
      <a id="closeTop" href="javascript:void(0)" class="close-btn d-block position-absolute text-decoration-none">&times;</a>
      <div class="side-form-content w-100 position-relative text-center">
        <?php (new Editor())->content_editor(); ?>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
