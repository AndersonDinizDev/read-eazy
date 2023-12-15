<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemIdToRemove = $_POST['id'];

    $cartItems = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array();

    $indexToRemove = array_search($itemIdToRemove, array_column($cartItems, 'id'));

    if ($indexToRemove !== false) {
        array_splice($cartItems, $indexToRemove, 1);
        $_SESSION['cart_items'] = $cartItems;

        echo json_encode(array('status' => 'success', 'message' => 'Item removido do carrinho com sucesso.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Item não encontrado no carrinho.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Método não permitido.'));
}
?>
