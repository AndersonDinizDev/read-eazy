<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha o ID do item a ser removido
    $itemIdToRemove = $_POST['id'];

    // Remova o item da sessão
    $cartItems = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array();

    // Encontre o índice do item no array
    $indexToRemove = array_search($itemIdToRemove, array_column($cartItems, 'id'));

    // Remova o item se encontrado
    if ($indexToRemove !== false) {
        array_splice($cartItems, $indexToRemove, 1);
        $_SESSION['cart_items'] = $cartItems;

        // Envie uma resposta (pode ser útil dependendo do seu aplicativo)
        echo json_encode(array('status' => 'success', 'message' => 'Item removido do carrinho com sucesso.'));
    } else {
        // Envie uma resposta indicando que o item não foi encontrado (pode ser útil dependendo do seu aplicativo)
        echo json_encode(array('status' => 'error', 'message' => 'Item não encontrado no carrinho.'));
    }
} else {
    // Responda com erro se a requisição não for POST
    echo json_encode(array('status' => 'error', 'message' => 'Método não permitido.'));
}
?>
