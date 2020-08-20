    </main>

    <footer id="footer">
      <section class="social">
        <div class="container">
          <ul style="list-style-type: none" class="row d-flex justify-content-center">
            <div class="row pt-4">
              <li><a href= "https://github.com/cyla00" target="_blank" title="Github"><img src="<?php echo REL_PATH; ?>public/img/git.png" width="30" height="30" alt=""/>Ismail</a></li>
              <li><a href= "https://github.com/cyla00" target="_blank" title="Github"><img src="<?php echo REL_PATH; ?>public/img/git.png" width="30" height="30" alt=""/>Sergio</a></li>
              <li><a href= "https://github.com/S-Thibault" target="_blank" title="Github"><img src="<?php echo REL_PATH; ?>public/img/git.png" width="30" height="30" alt=""/>Sylvain</a></li>
          </div>
        </div>
      </section>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <?php if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') { ?>
      <script src="<?php echo REL_PATH; ?>public/js/filterArticles.js"></script>
      <script src="<?php echo REL_PATH; ?>public/js/AJAX.js"></script>
      <script src="<?php echo REL_PATH; ?>public/js/login.js"></script>
      <script src="<?php echo REL_PATH; ?>public/js/index.js"></script>
      <script src="<?php echo REL_PATH; ?>public/js/script.js"></script>
    <?php
    } elseif (basename($_SERVER['SCRIPT_NAME']) === 'article.php') {
      ?>
      <script src="<?php echo REL_PATH; ?>public/js/AJAX.js"></script>
      <?php
    }
    ?>

  </body>
</html>
