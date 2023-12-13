<?php

require_once("../config/database.php");

if($_SERVER['REQUEST_METHOD'] === "GET") {

  try {

    $stmt = $database->prepare("SELECT * FROM products");
    $stmt->execute();

    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header("Content-Type: application/json");
    echo json_encode($response);

  } catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erro ao buscar registros no banco de dados: " . $e->getMessage()]);
  }
}