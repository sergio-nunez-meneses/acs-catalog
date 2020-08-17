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

<?php include '../includes/footer.php'; ?>
