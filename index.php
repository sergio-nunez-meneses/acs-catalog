<?php
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
