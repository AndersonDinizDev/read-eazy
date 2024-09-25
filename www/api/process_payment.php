<?php

require_once("../config/database.php");
require_once('../vendor/autoload.php');

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

MercadoPagoConfig::setAccessToken("KEY-HERE");

$client = new PaymentClient();

session_start();

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
                    "number" => $_POST['identificationNumber'] ?? '',
                ],
                "address" =>  array(
                    "street_name" => $_POST['streetName'] ?? '',
                )
            ],
            "payment_method_id" => "pix",
        ];

        $payment = $client->create($request);

        try {
            $stmt = $database->prepare("INSERT INTO orders (order_code, customer_email, amount, product, order_date, status) VALUES (?, ?, ?, ?, NOW(), 'pending')");
            $stmt->bindParam(1, $payment->id);
            $stmt->bindParam(2, $request['payer']['email']);
            $stmt->bindParam(3, $request['transaction_amount']);
            $stmt->bindParam(4, $request['description']);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error inserting order into the database: " . $e->getMessage();
        }

        $qrCodeBase64 = $payment->point_of_interaction->transaction_data->qr_code_base64;
        $hash = $payment->point_of_interaction->transaction_data->qr_code;

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username   = 'readeazy35@gmail.com';
        $mail->Password   = 'hfwy baag lquw zphj';
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->setFrom('readeazy35@gmail.com', 'ReadEazy');
        $mail->addAddress($request['payer']['email']);
        $mail->isHTML(true);

        $mail->Subject = 'Pedido realizado com sucesso !';
        $mail->Body = 'Olá ' . $request['payer']['first_name'] . ',<br><br>' .
            'Seu pedido com o código: ' . $payment->id . ' foi concluído com sucesso.<br>' .
            'Quem irá receber o pedido: ' . $request['payer']['first_name'] . ' ' . $request['payer']['last_name'] . '<br>' .
            'CPF: ' . $request['payer']['identification']['number'] . '<br>' .
            'Endereço: ' . $request['payer']['address']['street_name'] . '<br><br>' .
            'Clique no link a seguir para realizar o pagamento: ' . $payment->point_of_interaction->transaction_data->ticket_url;


        if (!$mail->send()) {
            echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
        }
        $_SESSION['cart_items'] = array();
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
</body>

</html>
