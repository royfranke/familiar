<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'autoloader.inc.php';
if (isset($_POST['fields']) && isset($_POST['user_id'])) {
      $field = $_POST['fields'];
      $user_firstName = $field[0];
      $user_lastName = $field[1];
      $user_email = $field[2];
      $user_name = $field[3];

      $user = new UsersContr();
      $user->updateUser($_POST['user_id'],$user_name,$user_email,$user_firstName,$user_lastName);

}