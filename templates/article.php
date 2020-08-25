<?php
$title = 'article ' . $_GET['id'];
include '../includes/header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="articleContainer">
        <?php (new Articles())->display_article_header(); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div id="articleContainer">
        <?php (new Articles())->display_article_main(); ?>
      </div>
      <div id="topForm" class="top-form position-fixed">
        <a id="closeTop" href="javascript:void(0)" class="close-btn d-block position-absolute text-decoration-none">&times;</a>
        <div class="side-form-content w-100 position-relative text-center">
          <?php (new Editor())->content_editor(); ?>
          <div class="d-flex justify-content-center">
            <p id="ajaxResponse" class="lead text-danger text-center"></p>
          </div>
        </div>
      </div>
    </div>

    <aside class="col-md-4 my-auto">
      <div class="p-5 mb-3 bg-warning">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">ACS News is a non profit organization with one and only aim: tell you the truth.</p>
        <div class="d-flex justify-content-around pt-4">
          <div class="">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-facebook mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="https://twitter.com/intent/tweet?text=<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-twitter mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-linkedin mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="<?php echo (new Articles())->get_article_link(); ?>" class="fa fa-instagram mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
        </div>
      </div>

      <div class="p-5 mb-3 bg-info">
        <h4 class="font-italic">Newsletter</h4>
        <form id="subscribeForm" method="POST" action="../actions/subscribe.php">
          <div class="form-group d-flex flex-column">
            <input type="email" class="form-control" name="email" placeholder="Enter your email" require>
          </div>
          <div class="form-group d-flex flex-column">
            <button type="submit" class="btn btn-primary" name="subscribe">Subscribe</button>
          </div>
        </form>
      </div>
    </aside>
  </div>
</div>


<?php include '../includes/footer.php'; ?>
