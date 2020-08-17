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
<section class="article-container">
  <article class="">
    <?php (new Articles())->display_element(); ?>
  </article>
</section>

<?php include '../includes/footer.php'; ?>
