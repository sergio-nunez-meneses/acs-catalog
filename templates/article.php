<?php
$title = 'article ' . $_GET['id'];
include '../includes/header.php';

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  ?>
  <button id="handler-tab">edit</button>
  <?php
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="articleContainer" class="">
        <?php (new Articles())->display_article_image(); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div id="articleContainer" class="">
        <?php (new Articles())->display_single_element(); ?>
      </div>
      <div id="editorContainer" class="hidden">
        <?php (new Editor())->content_editor(); ?>
      </div>
      <div class="">
        <p id="ajaxResponse" class="info"></p>
      </div>
    </div>
    <aside class="col-md-4 my-auto">
      <div class="p-5 mb-3 bg-warning">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">ACS News is a non profit organization with one and only aim: tell you the truth.</p>
        <div class="d-flex justify-content-around pt-4">
          <div class="">
            <a href="" class="fa fa-facebook mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="" class="fa fa-twitter mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="" class="fa fa-linkedin mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
          <div class="">
            <a href="" class="fa fa-instagram mx-auto my-3 py-2 pr-4 pl-2 text-white text-center text-decoration-none"></a>
          </div>
        </div>
      </div>

      <div class="p-4 mb-3 bg-info">
        <h4 class="font-italic">Newsletter</h4>
        <form id="subscribe-id" action="../actions/subscribe.php">
          <div class="form-group d-flex flex-column">
            <input type="email" class="form-control" placeholder="Enter your email" require>
          </div>
          <div class="form-group d-flex flex-column">
            <button type="submit" class="btn btn-primary">Subscribe</button>
          </div>
        </form>
      </div>
    </aside>
  </div>
</div>


<?php include '../includes/footer.php'; ?>
