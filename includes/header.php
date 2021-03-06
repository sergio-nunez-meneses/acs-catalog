<?php
ob_start();
session_start();

define('ABS_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('REL_PATH', DIRECTORY_SEPARATOR . basename(ABS_PATH) . DIRECTORY_SEPARATOR);

require_once ABS_PATH . 'controllers/db.php';
require_once ABS_PATH . 'controllers/user.php';
require_once ABS_PATH . 'controllers/articles.php';
require_once ABS_PATH . 'controllers/editor.php';
require_once ABS_PATH . 'controllers/mail.php';

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
  <link rel="stylesheet" href="<?php echo REL_PATH;?>public/css/searchcss.css">
  <link rel="stylesheet" href="<?php echo REL_PATH;?>public/less/style.css">
  <link rel="stylesheet" href="<?php echo REL_PATH;?>public/css/style.css">
  <script src="<?php echo REL_PATH;?>public/js/functionsDOM.js"></script>
  <title><?php echo $title; ?></title>
</head>
<body>

  <header>

    <!-- DISPLAY SUBSCRIPTION INFO -->
    <section>
      <div class="d-flex justify-content-center">
        <?php if (!empty($_GET['info'])) echo '<script type=text/javascript> alert("' . $_GET['info'] . '"); </script>'; ?>
      </div>
    </section>

    <!-- PROGRESS BAR -->
    <?php if (basename($_SERVER['SCRIPT_NAME']) === 'article.php') { ?>
      <section>
        <div class="header">
          <div class="progress-container w-100 position-fixed">
            <div id="progressBar" class="progress-bar bg-primary"></div>
          </div>
        </div>
      </section>
      <?php
    }
    ?>

    <section class="container-fluid">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-4">
          <!-- SIGN FORMS -->
          <div class="sign-form-container d-flex flex-column align-items-center">
            <button id="openSide" class="form-inline btn btn-lg btn-outline-dark align-items-center">Sign</button>
            <div id="sideForms" class="side-form position-fixed">
              <a id="closeSide" href="javascript:void(0)" class="close-btn d-block position-absolute text-decoration-none">&times;</a>
              <div class="side-form-content w-100 position-relative text-center">
                <div class="container p-3">
                  <button id="sign-in-tab" class="btn btn-info">Sign up</button>
                </div>
                <!-- SIGN IN -->
                <div class="container">
                  <form id="sign-in-form" class="" method="POST" action="models/sign_in.php">
                    <fieldset class="d-flex flex-column align-content-center">
                      <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="username" placeholder="username" required>
                      </div>
                      <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="password" required>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit" name="sign-in">Sign in</button>
                      </div>
                    </fieldset>
                  </form>
                </div>
                <!-- SIGN UP -->
                <div class="container">
                  <form id="sign-up-form" class="hidden" method="POST" action="models/sign_up.php">
                    <fieldset class="d-flex flex-column align-content-center">
                      <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="username" placeholder="username" required>
                      </div>
                      <div class="form-group">
                        <input class="random-password form-control form-control-lg" type="password" name="password" placeholder="password" required>
                      </div>
                      <div class="form-group">
                        <input class="random-password form-control form-control-lg" type="password" name="confirm-password" placeholder="confirm password" required>
                      </div>
                      <div class="form-group">
                        <button id="generatorButton" class="btn btn-lg btn-primary" type="button">Generate password</button>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit" name="sign-up">Sign up</button>
                      </div>
                    </fieldset>
                  </form>
                </div>
                <div class="d-flex justify-content-center">
                  <p id="displayErrors" class="lead text-danger"></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- LOGO -->
        <div class="col-md-4 text-center">
          <a href="<?php echo REL_PATH . 'index.php' ?>" class="active">
            <img src="https://i.ibb.co/X7Zd1KY/logo1.png" alt="logo">
          </a>
        </div>

        <!-- SEARCH BAR -->
        <div class="col-md-4 d-flex justify-content-end align-items-center">
          <div class="wrap">
            <form id="searchForm" class="form-inline" action="<?php echo REL_PATH . 'actions/searching.php' ?>" method="POST">
              <div class="form-group px-1">
                <input id="keyword" type="text" class="form-control form-control-lg" placeholder="search" name="search">
              </div>
              <div class="form-group px-1">
                <button type="submit" class="btn btn-lg btn-outline-secondary" name="search-btn">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </form>
            <div id="articleFounds" class="text-center text-primary"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- NAVBAR -->
    <section class="container-fluid">
      <div id="navbar" class="rounded">
        <div class="p-3">
          <nav class="default-navbar nav d-flex justify-content-between">
            <a class="btn btn-lg" href="<?php echo REL_PATH; ?>">Home</a>
            <a id="all_categories" class="btn btn-lg" href="javascript:void(0)">All</a>
            <a id="economy" class="btn btn-lg" href="javascript:void(0)">Culture</a>
            <a id="sport" class="btn btn-lg" href="javascript:void(0)">Sports</a>
            <a id="culture" class="btn btn-lg" href="javascript:void(0)">Economy</a>
            <a id="politics" class="btn btn-lg" href="javascript:void(0)">Politics</a>
          </nav>
        </div>
      </div>

      <!-- USER NAVBAR  -->
      <?php if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
        ?>
        <div class="my-1 rounded bg-warning">
          <div class="nav-scroller p-3 navi rounded">
            <?php $user->is_logged(); ?>
          </div>
        </div>
        <?php
      }
      ?>
    </section>
  </header>

  <main>
