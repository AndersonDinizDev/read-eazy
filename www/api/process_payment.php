<?php

require_once('../vendor/autoload.php');

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

MercadoPagoConfig::setAccessToken("TEST-4559123468904236-070219-d9dfc08291ce794c8d81025c8b989d91-153865232");

$client = new PaymentClient();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #loading-text {
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div style="font-weight: bold; color: green;" id="loading-text">Aguarde por favor, processando seus dados...</div>

    <?php

    try {
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
            "payment_method_id" => "pix",
        ];

        $payment = $client->create($request);

        $qrCodeBase64 = $payment->point_of_interaction->transaction_data->qr_code_base64;
        $hash = $payment->point_of_interaction->transaction_data->qr_code;
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
        setTimeout(function() {
            window.location.href = "<?= $payment->point_of_interaction->transaction_data->ticket_url ?>";
        }, 5000);
    </script>