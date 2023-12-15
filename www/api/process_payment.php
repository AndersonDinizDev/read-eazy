<?php

require_once('../vendor/autoload.php');

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

// Step 2: Set production or sandbox access token
MercadoPagoConfig::setAccessToken("TEST-4559123468904236-070219-d9dfc08291ce794c8d81025c8b989d91-153865232"); // Substitua pelo seu token real do MercadoPago

// Step 3: Initialize the API client
$client = new PaymentClient();

try {
    // Step 4: Create the request array
    $request = [
        "transaction_amount" => (float) ($_POST['transactionAmount'] ?? 0),
        "description" => $_POST['description'] ?? '',
        "payer" => [
            "email" => $_POST['email'] ?? '',
            "first_name" => $_POST['payerFirstName'] ?? '',
            "last_name" => $_POST['payerLastName'] ?? '',
            "identification" => [
                "type" => $_POST['identificationType'] ?? '',
                "number" => $_POST['identificationNumber'] ?? ''
            ]
        ],
        // Adicione o método de pagamento Pix
        "payment_method_id" => "pix",
    ];

    // Step 5: Make the request
    $payment = $client->create($request);

    // Extraindo informações do Pix
    $qrCodeBase64 = $payment->point_of_interaction->transaction_data->qr_code_base64;
    $hash = $payment->point_of_interaction->transaction_data->qr_code;

    // Step 7: Handle exceptions

} catch (MPApiException $e) {
    echo "Código de status: " . $e->getApiResponse()->getStatusCode() . "\n";

    $content = $e->getApiResponse()->getContent();

    if (is_string($content)) {
        echo "Conteúdo: " . $content . "\n";
    } else {
        echo "Conteúdo: Não foi possível exibir o conteúdo (não é uma string)\n";
        echo "Conteúdo original: " . print_r($content, true) . "\n";
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

?>

<script>
    // Aguarde alguns segundos (por exemplo, 5 segundos) e, em seguida, redirecione para a URL desejada
    setTimeout(function() {
        window.location.href = "<?= $payment->point_of_interaction->transaction_data->ticket_url ?>";
    }, 5000); // Tempo em milissegundos (5 segundos neste exemplo)
</script>