<?php
$webhookUrl = 'http://127.0.0.1:3000/webhook'; // Reemplaza con la URL de tu webhook
$data = array(
    'event' => 'payment_success',
    'amount' => 100.00,
    'customer_id' => 12345
);

// Inicializar el objeto cURL
$ch = curl_init();

// Establecer la URL y otras opciones necesarias
curl_setopt($ch, CURLOPT_URL, $webhookUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));



// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Verificar si se produjo un error
if(curl_errno($ch)) {
    echo 'Ocurrió un error al enviar el webhook: ' . curl_error($ch);
} else {
    echo 'Webhook enviado correctamente.';
}

// Cerrar la sesión cURL
curl_close($ch);
?>
                          