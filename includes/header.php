<?php
session_start();

define('ABS_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('REL_PATH', DIRECTORY_SEPARATOR . basename(ABS_PATH) . DIRECTORY_SEPARATOR);

require_once ABS_PATH . 'controllers/db.php';
require_once ABS_PATH . 'controllers/user.php';
require_once ABS_PATH . 'controllers/articles.php';

$user = new User();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ismail Khayam, Sergio Núñez Meneses and Sylvain Thibault" name="author">
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

      <section>
        <div class="" style="display: flex;justify-content: center;">
          <?php $db = new Database(); ?>
        </div>
      </section>
      <section>
        <div class="" style="display: flex;justify-content: center;">
          <!-- login or not login -->
          <?php $user->is_logged(); ?>
        </div>
      </section>

    </header>

    <main>
