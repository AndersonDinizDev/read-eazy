<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $itemId = $_POST['id'];
  $itemName = $_POST['name'];
  $itemValue = $_POST['value'];
  $itemImage = $_POST['image'];

  $cartItems = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array();
  $cartItems[] = array('id' => $itemId, 'name' => $itemName, 'value' => $itemValue, 'image' => $itemImage);
  $_SESSION['cart_items'] = $cartItems;

  echo json_encode(array('status' => 'success', 'message' => 'Item adicionado ao carrinho com sucesso.'));
} else {
  echo json_encode(array('status' => 'error', 'message' => 'Método não permitido.'));
}
?>
