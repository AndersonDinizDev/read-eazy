<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtenha os dados do item do corpo da requisição
  $itemId = $_POST['id'];
  $itemName = $_POST['name'];
  $itemValue = $_POST['value'];
  $itemImage = $_POST['image'];

  // Adicione o item à sessão
  $cartItems = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array();
  $cartItems[] = array('id' => $itemId, 'name' => $itemName, 'value' => $itemValue, 'image' => $itemImage);
  $_SESSION['cart_items'] = $cartItems;

  // Envie uma resposta (pode ser útil dependendo do seu aplicativo)
  echo json_encode(array('status' => 'success', 'message' => 'Item adicionado ao carrinho com sucesso.'));
} else {
  // Responda com erro se a requisição não for POST
  echo json_encode(array('status' => 'error', 'message' => 'Método não permitido.'));
}
?>
