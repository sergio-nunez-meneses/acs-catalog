<div class="w-100 d-inline p-3 border border-primary text-center">
<h1>welcome,
  <a href="<?php echo 'admin.php'; ?>" style="color: #000;">
    <?php echo $_SESSION['user']; ?>
  </a>
</h1>
<h3>
  <a href="<?php echo REL_PATH . 'actions/logout.php?logout=yes'; ?>" style="color: #000;">
  logout
</a>
</h3>
<h3>
  <button id="createTab" class="myButton">create</button>
</h3>
<div>
