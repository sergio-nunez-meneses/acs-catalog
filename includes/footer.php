</main>

<div class="mt-5 pt-5 pb-5 footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-xs-12 about-company">
        <img src="https://i.ibb.co/PT4Kbxb/logo-classic.png" alt="logo">
        <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a><a href="#"><i class="fa fa-twitter-square"></i></a><a href="#"><i class="fa fa-youtube-square"></i></a></p>
      </div>

      <div class="col-lg-3 col-xs-12 links">
        <h4 class="mt-lg-0 mt-sm-3">Links</h4>
        <ul class="m-0 p-0">
          <li><a href= "https://github.com/cyla00" target="_blank" title="Github"><img src="https://i.ibb.co/KsTFRHj/git.png" width="30" height="30" alt=""/>Ismail</a></li>
          <li><a href= "https://github.com/cyla00" target="_blank" title="Github"><img src="https://i.ibb.co/KsTFRHj/git.png" width="30" height="30" alt=""/>Sergio</a></li>
          <li><a href= "https://github.com/S-Thibault" target="_blank" title="Github"><img src="https://i.ibb.co/KsTFRHj/git.png" width="30" height="30" alt=""/>Sylvain</a></li>
          <li><a href="<?php echo REL_PATH; ?>templates/about.php">About</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-xs-12 location">
        <h4 class="mt-lg-0 mt-sm-4">Join our newsletter</h4>
          <div class="call-to-action my-4">
            <form id="subscribeForm" method="POST" action="<?php echo REL_PATH; ?>actions/subscribe.php">
              <div class="form-group d-flex flex-column">
                <input type="email" class="form-control" name="email" placeholder="Enter your email" require>
              </div>
              <div class="form-group d-flex flex-column">
                <button type="submit" class="btn btn-primary" name="subscribe">Subscribe</button>
              </div>
            </form>
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
<script src="<?php echo REL_PATH;?>public/js/script.js"></script>
<script src="<?php echo REL_PATH;?>public/js/searchAJAX.js"></script>

</script>
<?php if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') { ?>
  <script src="<?php echo REL_PATH; ?>public/js/filterArticles.js"></script>
  <script src="<?php echo REL_PATH; ?>public/js/AJAX.js"></script>
  <script src="<?php echo REL_PATH; ?>public/js/login.js"></script>
  <?php
} elseif (basename($_SERVER['SCRIPT_NAME']) === 'article.php') {
  ?>
  <script src="<?php echo REL_PATH; ?>public/js/AJAX.js"></script>
  <script src="<?php echo REL_PATH; ?>public/js/copyLink.js"></script>
  <script src="<?php echo REL_PATH; ?>/public/js/index.js"></script>
  <?php
}

?>
</body>
</html>
