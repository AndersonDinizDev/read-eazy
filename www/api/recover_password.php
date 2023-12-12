<?php
require_once("../config/database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = json_decode(file_get_contents("php://input"));

  try {
    $email = $data->user_email;

    $checkEmailSql = "SELECT * FROM users WHERE email = :email";
    $checkEmailStmt = $database->prepare($checkEmailSql);
    $checkEmailStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $checkEmailStmt->execute();

    if ($checkEmailStmt->rowCount() == 0) {
      $response['email_duplicate'] = true;
    } else {
      $token = md5(uniqid());

      $sql = "INSERT INTO recovery_tokens (email, token) VALUES (:email, :token)";
      $stmt = $database->prepare($sql);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':token', $token, PDO::PARAM_STR);
      $stmt->execute();

      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->Username   = 'readeazy35@gmail.com';
      $mail->Password   = 'hfwy baag lquw zphj';
      $mail->SMTPSecure = 'tls';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;

      $mail->setFrom('readeazy35@gmail.com', 'ReadEazy');
      $mail->addAddress($email);
      $mail->isHTML(true);

      $mail->Subject = 'Recuperação de Senha';
      $mail->Body = "Olá,<br><br>Você solicitou a recuperação de senha. Use o seguinte token para continuar: $token";

      if ($mail->send()) {
        $response['recover'] = true;
      } else {
        $response['email_send_error'] = true;
      }
    }
  } catch (PDOException | Exception $e) {
    $response['recover_error'] = true;
  }
}

header('Content-Type: application/json');
echo json_encode($response);
