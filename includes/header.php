<?php
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

      <section>
        <div class="header">
          <div class="progress-container">
            <div id="progressBar" class="progress-bar"></div>
          </div>
        </div>
      </section>

      <!-- title -->
      <section>
        <div class="">
          <a href="<?php echo REL_PATH . 'index.php' ?>" class="active">
            <img src="<?php echo REL_PATH . 'public/img/logo1.png' ?>" alt="logo">
          </a>
        </div>
      </section>

      <!-- check if user is logged -->
      <section>
        <div class="user-info">
          <?php $user->is_logged(); ?>
        </div>
      </section>

      <!-- navbar -->
      <section>
        <div id="navbar" class="navbar">
          <a href="<?php echo REL_PATH . 'index.php' ?>" class="active">Home</a>
          <a href="javascript:void(0)">News</a>
          <!-- search bar -->
          <div class="search-container">
            <form action="">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit">Submit</button>
            </form>
          </div>
        </div>
      </section>

    </header>

    <main>
