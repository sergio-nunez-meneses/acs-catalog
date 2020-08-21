<?php
require_once 'db.php';

class User extends Database
{

  public function sign_up()
  {
    $error = false;
    $username = $password = $error_msg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sign-up'])) {

      if (empty($_POST['username'])) {
        $error = true;
        $error_msg .= '<p>username cannot be empty</p>';
      } elseif (strlen($_POST['username']) < 6){
        $error = true;
        $error_msg .= '<p>username must contain more than 6 characters</p>';
      } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      }

      if (empty($_POST['password'])) {
        $error = true;
        $error_msg .= '<p>password cannot be empty</p>';
      } elseif (strlen($_POST['password']) < 7){
        $error = true;
        $error_msg .= '<p>password must contain more than 7 characters</p>';
      } elseif(!preg_match("#[0-9]+#", $_POST['password'])) {
        $error = true;
        $error_msg .= '<p>password must contain at least one number!</p>';
      } elseif(!preg_match("#[a-z]+#", $_POST['password'])) {
        $error = true;
        $error_msg .= '<p>password must contain at least one lowercase character!</p>';
      } elseif(!preg_match("#[A-Z]+#", $_POST['password'])) {
        $error = true;
        $error_msg .= '<p>password must contain at least one uppercase character!</p>';
      } elseif(!preg_match("#\W+#", $_POST['password'])) {
        $error = true;
        $error_msg .= '<p>password must contain at least one symbol!</p>';
      } elseif ($_POST['password'] !== $_POST['confirm-password']) {
        $error = true;
        $error_msg .= '<p>passwords do not match</p>';
      } else {
        $options = [
          'cost' => 12,
        ];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
      }
    }

    if (!$error) {
      $this->run_query('INSERT INTO authors VALUES (NULL, :username, :password)', ['username' => $username, 'password' => $password]);

      $_SESSION['logged_in'] = true;
      $_SESSION['user'] = $username;

      header('Location:../index.php');
    } else {
      header("Location:../index.php?error=yes&error_message=$error_msg");
    }
  }
  public function sign_in()
  {
    $error = false;
    $username = $password = $error_msg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sign-in'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $stmt = $this->run_query('SELECT * FROM authors WHERE author_username = :username', ['username' => $username]);
      $user = $stmt->fetch();

      if ($user == false) {
        $error = true;
        $error_msg .= '<p>user does not exist</p>';
      } else {
        $username = $user['author_username'];
        $stored_password = $user['author_password'];

        if (password_verify($password, $stored_password) && $error !== true) {
          $_SESSION['logged_in'] = true;
          $_SESSION['user'] = $username;
          
          header('Location:../index.php');
          ob_end_flush();
<<<<<<< HEAD
=======

>>>>>>> 5a9233e756f64c583c1401048ef025c83cf8e1a0
        } else {
          $error_msg .= '<p>password incorrect</p>';
          header("Location:../index.php?error=yes&error_message=$error_msg");
        }
      }
    }
  }
  public function logout() {
    if ($_GET['logout'] == 'yes') {
      session_unset();
      session_destroy();
      header('Location:../index.php');
    }
  }
  public function is_logged() {
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
      echo '<p style="color: #fff;">not logged in</p>';
    } else {
      include ABS_PATH . 'includes/login_nav.php';
    }
  }
}
