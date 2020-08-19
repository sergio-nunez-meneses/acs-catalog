<?php
<<<<<<< HEAD
$title = 'sign up';
include 'includes/header.php';
?>

<section>
  <div class="" style="display: flex; justify-content: center;">
    <?php if (!empty($_GET['error'])) echo $_GET['error_message']; ?>
  </div>
</section>

<section class="sign-form-container" style="display: flex; flex-direction: column; align-items: center;">
  <button id="sign-in-tab" class="">sign up</button>

  <!-- sign in form -->
  <form id="sign-in-form" class="" method="POST" action="models/sign_in.php">
    <fieldset class="">
    <legend>sign in</legend>
    <input class="" type="text" name="username" value="" placeholder="username" required>
    <input class="" type="password" name="password" value="" placeholder="password" required>
    <input class="" type="submit" name="sign-in" value="sign in">
    </fieldset>
  </form>
  <!-- sign up form -->
  <form id="sign-up-form" class="hidden" method="POST" action="models/sign_up.php">
    <fieldset class="">
    <legend>sign up</legend>
    <input class="" type="text" name="username" placeholder="username" required>
    <input class="random-password" type="password" name="password" placeholder="password" required>
    <input class="random-password" type="password" name="confirm-password" placeholder="confirm password" required>
    <input id="generatorButton" type="button" value="generate password">
    <input class="" type="submit" name="sign-up" value="sign up">
    </fieldset>
  </form>
  <p id="displayErrors"></p>
</section>

<?php include 'includes/footer.php'; ?>
=======
include "header.php";
?>
<br>
<body>



<h1>ACS News </h1>

</div>
<br>
<!-- navbar -->
<div class="mobile-container">
  <div id="navbar">
    <a href="#home" class="active">Home</a>
    <a href="javascript:void(0)">News</a>
    <a href="javascript:void(0)">Contact</a>
    <a href="javascript:void(0)">News</a>
    <a href="javascript:void(0)">Contact</a>
    <a href="javascript:void(0)">News</a>
    <a href="javascript:void(0)">Contact</a>
    <a href="javascript:void(0)">News</a>
    <a href="javascript:void(0)">Contact</a>
    <div class="search-container">
    <form action="/action_page.php">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit">Submit</button>
  </form>
</div>
</div>
</div>


<!-- cards -->
<div id="back">
<div class="content-wrapper">

  <div class="news-card">
    <a href="#" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/127513/pexels-photo-127513.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">Amazing First Title</h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
        <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>

  <div class="news-card">
    <a href="onepage.php" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/631954/pexels-photo-631954.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">Amazing Second Title that is Quite Long</h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam obcaecati ex natus nulla rem sequi laborum quod fugit&hellip;</p>
        <a href="onepage.php" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>

  <div class="news-card">
    <a href="#" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">Amazing Title</h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis beatae&hellip;</p>
        <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>

  <div class="news-card">
    <a href="#" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/248486/pexels-photo-248486.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">Amazing Forth Title that is Quite Long</h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">Lorem ipsum dolor sit amet!</p>
        <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>

  <div class="news-card">
    <a href="#" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/206660/pexels-photo-206660.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">Amazing Fifth Title</h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio&hellip;</p>
        <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>

  <div class="news-card">
    <a href="#" class="news-card__card-link"></a>
    <img src="https://images.pexels.com/photos/210243/pexels-photo-210243.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title">Amazing 6<sup>th</sup> Title</h2>
      <div class="news-card__post-date">Jan 29, 2018</div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia.</p>
        <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>

</div>

<!-- <button onclick="myFunction()">login</button>

<div id="myDIV">
  <p>
      <label for="login">User :</label>
      <input type="text" name="user" id="user" value="" />
  </p>
      <p>
        <label for="password">Password :</label>
        <input type="password" name="pass" id="pass" value="" />
        <input type="submit" name="submit" value="connexion" />
      </p>
  </div>
</div> -->


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (window.getComputedStyle(x).visibility === "hidden") {
    x.style.visibility = "visible";
  }
}
</script>

  </body>

  <?php
  include "footer.php";
  ?>
>>>>>>> front-dev
