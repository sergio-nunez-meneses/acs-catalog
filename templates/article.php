<?php
$title = 'article ' . $_GET['id'];
include '../includes/header.php';

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  ?>
  <button id="handler-tab">edit</button>
  <?php
}
?>
<section class="article-container">
  <div id="articleContainer" class="">
    <?php (new Articles())->display_single_element(); ?>
  </div>
  <div id="editorContainer" class="hidden">
    <?php (new Editor())->content_editor(); ?>
  </div>
  <div class="">
    <p id="ajaxResponse" class="info"></p>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
