    </main>

    <div class="mt-5 pt-5 pb-5 footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-xs-12 about-company">
          <img src="<?php echo REL_PATH . 'public/img/logo_classic.png' ?>" alt="logo">
           <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a><a href="#"><i class="fa fa-twitter-square"></i></a><a href="#"><i class="fa fa-youtube-square"></i></a></p>
        </div>

        <div class="col-lg-3 col-xs-12 links">
          <h4 class="mt-lg-0 mt-sm-3">Links</h4>
            <ul class="m-0 p-0">
              <li><a href= "https://github.com/cyla00" target="_blank" title="Github"><img src="<?php echo REL_PATH; ?>public/img/git.png" width="30" height="30" alt=""/>Ismail</a></li>
              <li><a href= "https://github.com/cyla00" target="_blank" title="Github"><img src="<?php echo REL_PATH; ?>public/img/git.png" width="30" height="30" alt=""/>Sergio</a></li>
              <li><a href= "https://github.com/S-Thibault" target="_blank" title="Github"><img src="<?php echo REL_PATH; ?>public/img/git.png" width="30" height="30" alt=""/>Sylvain</a></li>
              <li><a href="<?php echo REL_PATH; ?>templates/about.php">about</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-xs-12 location">
          <h4 class="mt-lg-0 mt-sm-4">Newsletter</h4>
          <p><span class="wpcf7-form-control-wrap EMAIL"><input type="email" name="EMAIL" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email" /></span></p>

          <div class="search-container">
            <div class="call-to-action my-4">
      <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
          <h5>Register for free</h5>
        </li>
        <li class="list-inline-item"><a href="" class="btn btn-primary">Sign up!</a></li>
      </ul>
    </div>

    </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col copyright">
          <p class=""><small class="text-white-50">© 2020. All Rights Reserved.</small></p>
        </div>
      </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" href="<?php echo REL_PATH;?>public/js/script.js"></script>

    </script>
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
      <script src="<?php echo REL_PATH; ?>public/js/copyLink.js"></script>
      <?php
    }
    ?>

  </body>
</html>
