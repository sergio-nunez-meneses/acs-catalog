<?php
session_start();
// $ip = $_SERVER['SERVER_ADDR'];
// $_SESSION['ip'] = $ip;
// echo $_SESSION['ip'];



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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo REL_PATH;?>public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo REL_PATH;?>public/css/style.css">
    <script src="<?php echo REL_PATH;?>public/js/functionsDOM.js"></script>
    <title><?php echo $title; ?></title>
    <style>
      .hidden {
        display: none;
      }
    </style>
  </head>
  <body>

    <header>

      <!-- title -->
      <section>
        <div class="">
          <h1>ACS News</h1>
        </div>
      </section>

      <!-- check if user is logged -->
      <section>
        <div class="" style="display: flex;justify-content: center;">
          <?php $user->is_logged(); ?>
        </div>
      <section>

      <!-- navbar -->
      <section>
        <div class="mobile-container">
          <div id="navbar">
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
        </div>
      </section>

    </header>

    <main>
