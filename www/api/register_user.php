<?php
require_once("../config/database.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $name = $data->user_name;
    $email = $data->user_email;
    $password = $data->user_password;
    $c_password = $data->user_c_password;
    $check = 0;

    $stmt = $database->prepare("INSERT INTO users (name, email, password) VALUES (:user_name, :user_email, :user_password)");
    $stmt->bindValue(":user_name", $name);
    $stmt->bindValue(":user_email", $email);
    $stmt->bindValue(":user_password", sha1($password));
    $stmt->execute();

    $check++;

    if (!$check) {
      $response['register'] = false;
    } else {
      $response['register'] = true;
    }
  } catch (PDOException $e) {
    if ($e->errorInfo[1] === 1062) {
      $response['email_error'] = true;
    } else {
      $response['email_error'] = false;
    }
  }
}

header('Content-Type: application/json');
echo json_encode($response);
