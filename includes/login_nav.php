<nav class="nav d-flex justify-content-around align-items-center mx-auto">
  <h5>Welcome,
    <a class="text-capitalize" href="<?php echo 'admin.php'; ?>">
      <?php echo $_SESSION['user']; ?>
    </a>
  </h5>
  <h5>
    <?php if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true) && basename($_SERVER['SCRIPT_NAME']) === 'index.php') {
      ?>
      <button id="articlesTab" class="btn bg-primary text-white">Display all articles</button>
      <?php
    }
    ?>
  </h5>
  <?php if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') { ?>
    <h5>
      <button id="createTab" class="btn btn-primary">
        Create article
      </button>
    </h5>
    <?php
  }
  ?>
  <?php if (basename($_SERVER['SCRIPT_NAME']) === 'article.php') { ?>
    <h5>
      <button class="btn btn-primary" id="handler-tab">
        Edit article
      </button>
    </h5>
    <?php
  }
  ?>
  <h5>
    <a class="" href="<?php echo REL_PATH . 'actions/logout.php?logout=yes'; ?>">
      <button class="btn btn-primary" type="button" name="button">Logout</button>
    </a>
  </h5>
<nav>
