<?php
require_once 'functions.php';
require_once 'config.php';
session_start();
$email = $_SESSION['email'];
$q = $_POST['answer_input'];
if (isset($_POST['login-btn'])) {
  if(login()) exit;
}
if(isset($_POST['edit']))
{ 
  edit();
  exit;
} 
if ($_GET['page'] == 'logout') {
  $_SESSION = array();
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Login</title>

    <!-- Bootstrap -->
    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">    
        <a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Test</font></font></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($menu as $text => $link): ?>                  
            <li class="nav-item"><a class="nav-link"  href="index.php?page=<?= $link ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?= $text ?></font></font></a></li>
            <?php endforeach;  ?>

            <?php if (isset($_SESSION['user'])): ?>
            <li class="nav-item"><a class="nav-link"  href="index.php?page=my-profile"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">My profile</font></font></a></li>
            <?php endif ?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if (!isset($_SESSION['user'])): ?>
            <li class="sign-up"><a href="index.php?page=sign-up">Sign Up</a></li>
            <li><a href="index.php?page=login">Login</a></li>
          <?php else: ?>
            <li>Hello, <?= $_SESSION['user'] ?>! <img class="ava-img" src="<?= $_SESSION['ava'] ?>"></li>
            <li class="logout"><a href="index.php?page=logout">Logout</a></li>
            <?php endif ?>
        </ul>
      </div>
    </nav>


