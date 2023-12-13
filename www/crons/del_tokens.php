<?php
require_once("../config/database.php");

try {
  $tokenLifetime = 100;

  $expirationTime = date('Y-m-d H:i:s', time() - $tokenLifetime);

  $excluirTokensExpiradosSql = "DELETE FROM recovery_tokens WHERE created_at < :expirationTime";
  $excluirTokensExpiradosStmt = $database->prepare($excluirTokensExpiradosSql);
  $excluirTokensExpiradosStmt->bindParam(':expirationTime', $expirationTime, PDO::PARAM_STR);
  $excluirTokensExpiradosStmt->execute();

  echo "Registros expirados excluídos com sucesso.";
} catch (PDOException $e) {
  echo "Erro ao excluir registros expirados: " . $e->getMessage();
}
