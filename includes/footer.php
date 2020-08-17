    </main>

    <?php if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') { ?>
      <script src="<?php echo REL_PATH; ?>public/js/login.js"></script>
    <?php
    } elseif (basename($_SERVER['SCRIPT_NAME']) === 'admin.php') {
      ?>
      <script src="<?php echo REL_PATH; ?>public/js/AJAX.js"></script>
    <?php
    }
    ?>

  </body>
</html>
