<?php
$title = 'article ' . $_GET['id'];
include '../includes/header.php';
?>

<section>
  <div class="" style="display: flex; justify-content: space-around; align-content: center; align-items: center;">
    <h1><a href="../templates/admin.php" style="color: #000;">
      home
    </a></h1>
    <h1>welcome, <?php echo $_SESSION['user']; ?></h1>
    <h3><a href="../actions/logout.php?logout=yes" style="color: #000;">
      logout
    </a></h3>
  </div>
</section>
<?php
if(isset($_SESSION['logged_in'])) {
  ?>
  <button id="handler-tab">edit</button>
  <?php
}
?>
<section class="article-container">
  <article id="articleContainer" class="">
    <?php (new Articles())->display_single_element(); ?>
  </article>
  <div id="editorContainer" class="hidden">
    <?php (new Editor())->content_editor(); ?>
  </div>
  <p id="ajaxResponse" class="info"></p>
</section>

<?php include '../includes/footer.php'; ?>
