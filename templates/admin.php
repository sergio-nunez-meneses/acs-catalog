<?php
$title = 'admin page';
include '../includes/header.php';
?>

<section>
  <div class="" style="display: flex; justify-content: space-around; align-content: center; align-items: center;">
    <h1>welcome, <?php echo $_SESSION['user']; ?></h1>
    <h3><a href=" <?php echo '../actions/logout.php?logout=yes'; ?> " style="color: #000;">
      logout
    </a></h3>
  </div>
</section>
<section>
  <div class="" style="display: flex; flex-direction: column; justify-content: space-around; align-content: center; align-items: center;">
    <?php if ($_SESSION['logged_in'] == true) {
      ?>
      <button id="articlesTab" class="">all articles</button>
      <?php
    }
    ?>
  </div>
  <div class="" style="display: flex; justify-content: space-around; align-content: center; align-items: center;">
    <article id="recentArticles" class="">
      <?php (new Articles())->display_all_elements('articles'); ?>
    </article>
    <article id="allArticles" class="hidden">
      <?php (new Articles())->display_all_elements('all_articles'); ?>
    </article>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
