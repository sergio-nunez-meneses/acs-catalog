<?php
require_once 'db.php';

class Mail extends Database
{

  public function subscribe($email)
  {
    $this->run_query('INSERT INTO subscription VALUES (NULL, :email)', [
      'email' => $email,
    ]);
  }

  public function is_subscribed($email)
  {
    $stmt = $this->run_query('SELECT * FROM subscription WHERE mail_registered = :email', ['email' => $email]);
    $get_email = $stmt->fetch();
    return $get_email;
  }

  function register_subscription()
  {
    $form = 'ajax-mail-form';
    $error = false;
    $info = $error_msg = '';

    if (empty($_POST['email'])) {
      $error = true;
      $error_message .= '<p>email cannot be empty</p>';
    } elseif (!preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $_POST['email'])) {
      $error = true;
      $error_message .= '<p>invalid email format</p>';
    } else {
      $email = $_POST['email'];
    }

    if (!($error)) {
      $already_subscribed = $this->is_subscribed($email);

      if ($already_subscribed == false) {
        $to = 'To: contact@site.com';
        $subject = "New subscription";
        $message = "New subscription from $email";
        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
          $this->subscribe($email);

          $info .= 'mail sucessfully sent!';
          header("Location:../index.php?info=$info");
        } else {
          $info .= 'failed to send email!';
          header("Location:../index.php?info=$info");
        }
      } else {
        $error_msg = 'You are already subscribed';
        header("Location:../index.php?info=$error_msg");
      }
    } else {
      header("Location:../index.php?info=$error_msg");
    }
  }

  public function get_subscribers()
  {
    $stmt = $this->run_query('SELECT mail_registered FROM subscription');
    $get_emails = $stmt->fetchAll();
    return $get_emails;
  }

  public function inform_subscriber()
  {
    $error = false;
    $info = $error_msg = '';
    $subscribers = $this->get_subscribers();

    if (!$subscribers) {
      $error = true;
      $error_msg .= 'There are no subscribers';
    }

    if (!$error) {
      $subject = 'New article available';
      $message = 'A new article has been publish today. Click here to read it!';
      $headers = "From: ACS News";

      foreach ($subscribers as $subscriber) {
        $to = 'To: ' . $subscriber['mail_registered'];
        mail($to, $subject, $message, $headers);
      }
      // echo 'Mail sucessfully sent';
    } else {
      // echo 'Failed to send email';
    }
  }
}
