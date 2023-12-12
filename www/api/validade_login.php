<?php

require_once("../config/sec.php");
require_once("../config/database.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $data = json_decode(file_get_contents('php://input'));

  $email = $data->email;
  $password = $data->password;
  $check = 0;

  $stmt = $database->prepare("SELECT id, name, email FROM users WHERE email = ? AND password = ?");
  $stmt->execute([$email, sha1($password)]);
  $row = $stmt->fetch();

  if ($row) {
    if (!isset($_SESSION)) session_start();

    $_SESSION['user-id'] = $row['id'];
    $_SESSION['user-name'] = $row['name'];
    $check++;
  }


  if (!$check) {
    $response['success'] = false;
  } else {
    $response['success'] = true;
  }
}

header('Content-Type: application/json');

echo json_encode($response);
