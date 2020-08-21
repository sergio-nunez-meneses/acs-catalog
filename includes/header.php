<?php
ob_start();
session_start();

define('ABS_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('REL_PATH', DIRECTORY_SEPARATOR . basename(ABS_PATH) . DIRECTORY_SEPARATOR);

require_once ABS_PATH . 'controllers/db.php';
require_once ABS_PATH . 'controllers/user.php';
require_once ABS_PATH . 'controllers/articles.php';
require_once ABS_PATH . 'controllers/editor.php';

$user = new User();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Ismail Khayam, Sergio Núñez Meneses and Sylvain Thibault" name="author">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo REL_PATH;?>public/css/normalize.css">
  <link rel="stylesheet" href="<?php echo REL_PATH;?>public/css/style.css">
  <link rel="stylesheet" href="<?php echo REL_PATH;?>public/less/style.css">
  <script src="<?php echo REL_PATH;?>public/js/functionsDOM.js"></script>
  <title><?php echo $title; ?></title>
</head>
<body>

  <header>

    <!-- progressBar -->
    <section>
      <div class="header">
        <div class="progress-container">
          <div id="progressBar" class="progress-bar"></div>
        </div>
      </div>
    </section>

        <div class="container">
        <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
              <section class="sign-form-container" style="display: flex; flex-direction: column; align-items: center;">
                <button id="sign-in-tab" class="">sign up</button>
                <form id="sign-in-form" class="" method="POST" action="models/sign_in.php">
                  <fieldset class="">
                  <legend>sign in</legend>
                  <input class="" type="text" name="username" value="" placeholder="username" required>
                  <input class="" type="password" name="password" value="" placeholder="password" required>
                  <input class="" type="submit" name="sign-in" value="sign in">
                </fieldset>
              </form>
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
          </div>

            <div class="col-4 text-center">
                  <a href="<?php echo REL_PATH . 'index.php' ?>" class="active">
                    <img src="<?php echo REL_PATH . 'public/img/logo1.png' ?>" alt="logo">
                  </a>
                </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              <div class="wrap">
     <div class="search">
       <form class="" action="actions/search.php" method="post">
         <input type="text" class="searchTerm" placeholder="Search">
         <button type="submit" class="searchButton">
           <i class="fa fa-search"></i>
        </button>
       </form>

     </div>
  </div>
        </header>

          <!-- navbar -->
          <div id="navbar">
            <div class="nav-scroller py-1 mb-2">
              <nav class="nav d-flex justify-content-between">
                <a class="p-2" href="#">World</a>
                <a class="p-2" href="#">U.S.</a>
                <a class="p-2" href="#">Technology</a>
                <a class="p-2" href="#">Design</a>
                <a class="p-2" href="#">Culture</a>
                <a class="p-2" href="#">Business</a>
                <a class="p-2" href="#">Politics</a>
                <a class="p-2" href="#">Opinion</a>
                <a class="p-2" href="#">Science</a>
                <a class="p-2" href="#">Health</a>
                <a class="p-2" href="#">Style</a>
                <a class="p-2" href="#">Travel</a>
              </nav>
            </div>
          </div>

          <!-- check if user is logged  -->
          <section>
            <div class="user-info">
              <?php $user->is_logged(); ?>
            </div>
          </section>


    </header>

  <main>
