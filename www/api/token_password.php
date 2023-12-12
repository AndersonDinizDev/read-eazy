<?php
require_once("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = json_decode(file_get_contents("php://input"));

  try {
    $email = $data->user_email;
    $token = $data->recovery_token;
    $novaSenha = $data->user_password;

    $verificarTokenSql = "SELECT * FROM recovery_tokens WHERE email = :email AND token = :token";
    $verificarTokenStmt = $database->prepare($verificarTokenSql);
    $verificarTokenStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $verificarTokenStmt->bindParam(':token', $token, PDO::PARAM_STR);
    $verificarTokenStmt->execute();

    if ($verificarTokenStmt->rowCount() > 0) {
      
      $senhaHashed = sha1($novaSenha);

      $atualizarSenhaSql = "UPDATE users SET password = :password WHERE email = :email";
      $atualizarSenhaStmt = $database->prepare($atualizarSenhaSql);
      $atualizarSenhaStmt->bindParam(':password', $senhaHashed, PDO::PARAM_STR);
      $atualizarSenhaStmt->bindParam(':email', $email, PDO::PARAM_STR);
      $atualizarSenhaStmt->execute();

      $response['token'] = true;
    } else {
      $response['token'] = false;
    }
  } catch (PDOException $e) {
    $response['erro_verificacao_token'] = true;
  }
}

header('Content-Type: application/json');
echo json_encode($response);
